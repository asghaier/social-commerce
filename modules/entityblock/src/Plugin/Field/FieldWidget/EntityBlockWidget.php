<?php

/**
 * @file
 * Contains \Drupal\entityblock\Plugin\Field\FieldWidget\EntityBlockWidget.
 */

namespace Drupal\entityblock\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'EntityBlock' widget.
 *
 * @FieldWidget(
 *   id = "entityblock_default",
 *   label = @Translation("EntityBlock"),
 *   field_types = {
 *     "entityblock"
 *   }
 * )
 */
class EntityBlockWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
      'view_modes' => array('full'),
      'force_enabled' => FALSE,
      'force_title' => FALSE,
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = parent::settingsForm($form, $form_state);

    $elements['view_modes'] = array(
      '#type' => 'select',
      '#title' => $this->t('View modes'),
      '#default_value' => $this->getSetting('view_modes'),
      '#description' => $this->t('View modes that are available to the user to choose from, when you select only 1 option then the user is not able to make a selection.'),
      '#required' => TRUE,
      '#options' => $this->getViewModes(),
      '#multiple' => TRUE,
    );
    $elements['force_enabled'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Force "Display as block"'),
      '#description' => $this->t('Do not provide the user a "Display as block" checkbox. You do not want to set this checkbox if you provide a multi value field because the user cannot remove blocks then.'),
      '#default_value' => $this->getSetting('force_enabled'),
    );
    $elements['force_title'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Force "Block title"'),
      '#description' => $this->t('Do not provide the user a "Block title" textfield.'),
      '#default_value' => $this->getSetting('force_title'),
    );

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = array();

    if ($this->getSetting('view_modes')) {
      $view_modes = array_intersect_key($this->getViewModes(), array_flip($this->getSetting('view_modes')));
      $summary[] = $this->t('View modes: %view_modes', array('%view_modes' => implode(', ', $view_modes)));
    }
    else {
      $summary[] = $this->t('No view modes selected');
    }

    if ($this->getSetting('force_enabled')) {
      $summary[] = $this->t('Force "Display as block"');
    }
    if ($this->getSetting('force_title')) {
      $summary[] = $this->t('Force "Block title"');
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $has_fillable_field = FALSE;
    if (!$this->getSetting('force_enabled')) {
      $has_fillable_field = TRUE;
      $element['enabled'] = array(
        '#type' => 'checkbox',
        '#title' => $this->t('Display as block'),
        '#default_value' => $items[$delta]->enabled,
        '#attributes' => array(
          'class' => array('entityblock-enabled'),
        ),
        '#required' => $element['#required'],
      );
    }
    else {
      $element['enabled'] = array(
        '#type' => 'value',
        '#default_value' => $this->getSetting('force_enabled'),
      );
    }

    if (!$this->getSetting('force_title')) {
      $has_fillable_field = TRUE;

      // Get entity title key such that we can copy the enity title into the block title.
      $element_title_key = \Drupal::entityTypeManager()->getDefinition($this->fieldDefinition->getTargetEntityTypeId())->getKey('label');
      if (!empty($form[$element_title_key])) {
        $form[$element_title_key]['#attributes']['class'][] = 'entity-title-field';
      }

      $element['title'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('Block title'),
        '#default_value' => $items[$delta]->title,
        '#description' => $this->t("The entity title will be used when this field is left empty. Use &lt;none&gt; if you don't want a block title."),
        '#attributes' => array(
          'class' => array('entityblock-title'),
        ),
        '#attached' => array(
          'library' => array('entityblock/drupal.entityblock'),
        ),
        '#required' => $element['#required'],
      );
    }
    else {
      $element['title'] = array(
        '#type' => 'value',
        '#default_value' => $this->getSetting('force_title'),
      );
    }

    $view_modes = [];
    if ($this->getSetting('view_modes')) {
      $view_modes = $this->getSetting('view_modes');
    }

    if (count($view_modes) > 1) {
      $has_fillable_field = TRUE;

      $element['view_mode'] = array(
        '#type' => 'select',
        '#title' => $this->t('Render the block with this view mode'),
        '#default_value' => $items[$delta]->view_mode,
        '#options' => $view_modes,
        '#attributes' => array(
          'class' => array('entityblock-view-mode'),
        ),
        '#required' => $element['#required'],
      );
    }
    else {
      $element['view_mode'] = array(
        '#type' => 'value',
        '#default_value' => reset($view_modes),
      );
    }

    if (!$this->getSetting('force_enabled')) {
      $element['view_mode']['#states'] = $element['title']['#states'] = array(
        'invisible' => array(
          'input[name="' . $this->fieldDefinition->getName() . '[' . $delta . '][enabled]' . '"]' => array('checked' => FALSE),
        ),
      );
    }

    // We do not have any fields.
    if (!$has_fillable_field) {
      $element['placeholder'] = array(
        '#type' => 'item',
        '#markup' => $this->t('Block @delta', array('@delta' => $delta + 1)),
      );
    }

    // If cardinality is 1, ensure a label is output for the field by wrapping it
    // in a details element.
    if ($this->fieldDefinition->getFieldStorageDefinition()->getCardinality() == 1) {
      $element += array(
        '#type' => 'fieldset',
      );
    }

    return $element;
  }

  /**
   * Helper function to return a list of view modes.
   */
  private function getViewModes() {
    return array_map(function ($view_mode) {
      return $view_mode['label'];
    }, \Drupal::entityManager()->getViewModes($this->fieldDefinition->getTargetEntityTypeId()));
  }
}
