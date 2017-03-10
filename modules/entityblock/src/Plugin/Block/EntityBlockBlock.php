<?php
/**
 * @file
 * Contains \Drupal\entityblock\Plugin\Block\EntityBlockBlock.
 */

namespace Drupal\entityblock\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Provides an entityblock block.
 *
 * @Block(
 *  id = "entityblock_block",
 *  admin_label = @Translation("EntityBlock"),
 *  deriver = "Drupal\entityblock\Plugin\Derivative\EntityBlockContent"
 * )
 */
class EntityBlockBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The entity manager service.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface.
   */
  protected $entityManager;

  /**
   * The Drupal account to use for checking for access to block.
   *
   * @var \Drupal\Core\Session\AccountInterface.
   */
  protected $account;

  /**
   * Constructs a new BlockContentBlock.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param EntityManagerInterface
   *   The entity manager service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityManagerInterface $entity_manager, AccountInterface $account) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->entityManager = $entity_manager;
    $this->account = $account;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity.manager'),
      $container->get('current_user')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'label_override' => FALSE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $block_form = [];
    $block_form['label_override'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Override block title'),
      '#default_value' => $this->configuration['label_override'],
      '#description' => $this->t('Selecting this will allow you to override the block title that is set in the EntityBlock.')
    ];

    return $block_form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['label_override'] = $form_state->getValue('label_override');
  }

  /**
   * {@inheritdoc}
   */
  public function label() {
    $field_value = $this->loadFieldValue();
    if ($field_value && (!isset($this->configuration['label_override']) || !$this->configuration['label_override'])) {
      return $field_value->title;
    }
    return parent::label();
  }

  /**
   * Helper function to load the entity of this entityblock.
   */
  private function loadEntity() {
    $key = $this->getDerivativeId();

    list($field_uuid, $entity_uuid, $delta) = explode('|', $key);

    if ($field = $this->loadField()) {
      return $this->entityManager->loadEntityByUuid($field->getTargetEntityTypeId(), $entity_uuid);
    }
  }

  /**
   * Helper function to load the field of this entityblock.
   */
  private function loadField() {
    $key = $this->getDerivativeId();
    list($field_uuid, $entity_uuid, $delta) = explode('|', $key);

    return $this->entityManager->loadEntityByUuid('field_storage_config', $field_uuid);
  }

  /**
   * Helper function to load the field value for this entityblock.
   */
  private function loadFieldValue() {
    $key = $this->getDerivativeId();
    list($field_uuid, $entity_uuid, $delta) = explode('|', $key);

    $entity = $this->loadEntity();
    $field = $this->loadField();

    return $entity->{$field->getName()}->get($delta);
  }

  /**
   * Implements \Drupal\block\BlockBase::blockBuild().
   */
  public function build() {
    $entity = $this->loadEntity();
    $field_value = $this->loadFieldValue();
    if ($entity && $field_value) {
      $content = $this->entityManager->getViewBuilder($entity->getEntityTypeId())->view($entity, $field_value->view_mode);
      $content['#title'] = $this->label();
      $content['#entityblock'] = TRUE;
      return $content;
    }
    return array(
      '#markup' => t('Block with key %key does not exist.', array(
        '%key' => $this->getDerivativeId(),
      )),
      '#access' => $this->account->hasPermission('administer blocks')
    );
  }

  /**
   * Implements \Drupal\block\BlockBase::access().
   */
  public function blockAccess(AccountInterface $account) {
    if ($account->hasPermission('access content')) {
      $entity = $this->loadEntity();
      if ($entity) {
        return $entity->access('view', $account, TRUE);
      }
      return AccessResult::forbidden();
    }
  }
}
