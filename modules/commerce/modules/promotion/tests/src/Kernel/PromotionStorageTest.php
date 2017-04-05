<?php

namespace Drupal\Tests\commerce_promotion\Kernel;

use Drupal\commerce_order\Entity\OrderType;
use Drupal\commerce_promotion\Entity\Coupon;
use Drupal\commerce_promotion\Entity\Promotion;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Tests\commerce\Kernel\CommerceKernelTestBase;

/**
 * Tests promotion storage.
 *
 * @group commerce
 */
class PromotionStorageTest extends CommerceKernelTestBase {

  /**
   * The promotion storage.
   *
   * @var \Drupal\commerce_promotion\PromotionStorageInterface
   */
  protected $promotionStorage;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'entity_reference_revisions',
    'profile',
    'state_machine',
    'commerce_order',
    'commerce_product',
    'commerce_promotion',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->installEntitySchema('profile');
    $this->installEntitySchema('commerce_order');
    $this->installEntitySchema('commerce_order_type');
    $this->installEntitySchema('commerce_promotion');
    $this->installEntitySchema('commerce_promotion_coupon');
    $this->installConfig([
      'profile',
      'commerce_order',
      'commerce_promotion',
    ]);

    $this->promotionStorage = $this->container->get('entity_type.manager')->getStorage('commerce_promotion');
  }

  /**
   * Tests loadValid().
   */
  public function testLoadValid() {
    $order_type = OrderType::load('default');

    // Starts now, enabled. No end time.
    $promotion1 = Promotion::create([
      'name' => 'Promotion 1',
      'order_types' => [$order_type],
      'stores' => [$this->store->id()],
      'status' => TRUE,
    ]);
    $this->assertEquals(SAVED_NEW, $promotion1->save());

    // Starts now, disabled. No end time.
    /** @var \Drupal\commerce_promotion\Entity\Promotion $promotion2 */
    $promotion2 = Promotion::create([
      'name' => 'Promotion 2',
      'order_types' => [$order_type],
      'stores' => [$this->store->id()],
      'status' => FALSE,
    ]);
    $this->assertEquals(SAVED_NEW, $promotion2->save());
    // Jan 2014, enabled. No end time.
    $promotion3 = Promotion::create([
      'name' => 'Promotion 3',
      'order_types' => [$order_type],
      'stores' => [$this->store->id()],
      'status' => TRUE,
      'start_date' => '2014-01-01T20:00:00Z',
    ]);
    $this->assertEquals(SAVED_NEW, $promotion3->save());
    // Start in 1 week, end in 1 year. Enabled.
    $promotion4 = Promotion::create([
      'name' => 'Promotion 4',
      'order_types' => [$order_type],
      'stores' => [$this->store->id()],
      'status' => TRUE,
      'start_date' => gmdate('Y-m-d', time() + 604800),
      'end_date' => gmdate('Y-m-d', time() + 31536000),
    ]);
    $this->assertEquals(SAVED_NEW, $promotion4->save());

    // Verify valid promotions load.
    $valid_promotions = $this->promotionStorage->loadValid($order_type, $this->store);
    $this->assertEquals(2, count($valid_promotions));

    // Move the 4th promotions start week to a week ago, makes it valid.
    $promotion4->setStartDate(new DrupalDateTime('-1 week'));
    $promotion4->save();

    $valid_promotions = $this->promotionStorage->loadValid($order_type, $this->store);
    $this->assertEquals(3, count($valid_promotions));

    // Set promotion 3's end date six months ago, making it invalid.
    $promotion3->setEndDate(new DrupalDateTime('-6 month'));
    $promotion3->save();

    $valid_promotions = $this->promotionStorage->loadValid($order_type, $this->store);
    $this->assertEquals(2, count($valid_promotions));
  }

  /**
   * Tests that promotions with coupons do not get loaded PromotionStorage::loadValid.
   */
  public function testValidWithCoupons() {
    $order_type = OrderType::load('default');

    $promotion1 = Promotion::create([
      'name' => 'Promotion 1',
      'order_types' => [$order_type],
      'stores' => [$this->store->id()],
      'status' => TRUE,
    ]);
    $promotion1->save();

    /** @var \Drupal\commerce_promotion\Entity\Promotion $promotion2 */
    $promotion2 = Promotion::create([
      'name' => 'Promotion 2',
      'order_types' => [$order_type],
      'stores' => [$this->store->id()],
      'status' => TRUE,
    ]);
    $promotion2->save();
    // Add a coupon to promotion2 and validate it does not load.
    $coupon = Coupon::create([
      'code' => $this->randomString(),
      'status' => TRUE,
    ]);
    $coupon->save();
    $promotion2->get('coupons')->appendItem($coupon);
    $promotion2->save();
    $promotion2 = $this->reloadEntity($promotion2);

    $promotion3 = Promotion::create([
      'name' => 'Promotion 3',
      'order_types' => [$order_type],
      'stores' => [$this->store->id()],
      'status' => TRUE,
    ]);
    $promotion3->save();

    $this->assertEquals(2, count($this->promotionStorage->loadValid($order_type, $this->store)));
  }

  /**
   * Tests loading a promotion by a coupon.
   */
  public function testLoadByCoupon() {
    $order_type = OrderType::load('default');

    $coupon_code = $this->randomMachineName();
    $coupon = Coupon::create([
      'code' => $coupon_code,
      'status' => TRUE,
    ]);
    $coupon->save();

    // Starts now, enabled. No end time.
    $promotion1 = Promotion::create([
      'name' => 'Promotion 1',
      'order_types' => [$order_type],
      'stores' => [$this->store->id()],
      'status' => TRUE,
      'coupons' => [$coupon],
    ]);
    $this->assertEquals(SAVED_NEW, $promotion1->save());
    // Starts now, enabled. No end time.
    $promotion2 = Promotion::create([
      'name' => 'Promotion 2',
      'order_types' => [$order_type],
      'stores' => [$this->store->id()],
      'status' => TRUE,
    ]);
    $this->assertEquals(SAVED_NEW, $promotion2->save());

    // Verify valid promotions load.
    $valid_promotion = $this->promotionStorage->loadByCoupon($order_type, $this->store, $coupon);
    $this->assertEquals($promotion1->label(), $valid_promotion->label());
  }

}
