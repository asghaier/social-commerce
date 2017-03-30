<?php

namespace Drupal\Tests\social_commerce_tests\Functional;

/**
 * Tests that the Social Commerce Tests UI pages are reachable.
 *
 */
class UiPageTest extends SocialCommerceBrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['social_commerce_tests'];

  /**
   * We use the minimal profile because we want to test local action links.
   *
   * @var string
   */
  protected $profile = 'minimal';

  /**
   * Tests that the social-commerce/simple page works.
   */
  public function testSocialCommerceSimplePage() {
    $account = $this->drupalCreateUser(['access social commerce simple page']);
    $this->drupalLogin($account);

    $this->drupalGet('social-commerce/simple');
    $this->assertSession()->statusCodeEquals(200);

    $this->assertSession()->pageTextContains('Simple page: The quick brown fox jumps over the lazy dog.');
  }

}
