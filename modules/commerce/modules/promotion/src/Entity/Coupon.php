<?php

namespace Drupal\commerce_promotion\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Coupon entity.
 *
 * @ContentEntityType(
 *   id = "commerce_promotion_coupon",
 *   label = @Translation("Coupon"),
 *   label_singular = @Translation("coupon"),
 *   label_plural = @Translation("coupons"),
 *   label_count = @PluralTranslation(
 *     singular = "@count coupon",
 *     plural = "@count coupons",
 *   ),
 *   handlers = {
 *     "storage" = "Drupal\commerce_promotion\CouponStorage",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "form" = {
 *       "add" = "Drupal\Core\Entity\ContentEntityForm",
 *       "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm"
 *     },
 *   },
 *   base_table = "commerce_promotion_coupon",
 *   admin_permission = "administer commerce_promotion",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "code",
 *     "uuid" = "uuid",
 *     "status" = "status",
 *   },
 * )
 */
class Coupon extends ContentEntityBase implements CouponInterface {

  /**
   * {@inheritdoc}
   */
  public function getPromotion() {
    return $this->get('promotion_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getPromotionId() {
    return $this->get('promotion_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function getCode() {
    return $this->get('code')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCode($code) {
    $this->set('code', $code);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isActive() {
    return (bool) $this->getEntityKey('status');
  }

  /**
   * {@inheritdoc}
   */
  public function setActive($active) {
    $this->set('status', (bool) $active);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // The promotion backreference, populated by Promotion::postSave().
    $fields['promotion_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Promotion'))
      ->setDescription(t('The parent promotion.'))
      ->setSetting('target_type', 'commerce_promotion')
      ->setReadOnly(TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['code'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Coupon code'))
      ->setDescription(t('The Coupon entity code.'))
      ->addConstraint('CouponCode')
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['status'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Active status'))
      ->setDescription(t('A boolean indicating whether the Coupon is active.'))
      ->setDefaultValue(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => 99,
      ])
      ->setDisplayConfigurable('form', TRUE);

    return $fields;
  }

}
