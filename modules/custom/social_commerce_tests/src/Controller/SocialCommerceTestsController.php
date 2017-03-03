<?php

namespace Drupal\social_commerce_tests\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller routines for Social Commerce Tests routes.
 */
class SocialCommerceTestsController extends ControllerBase {

  /**
   * Constructs a simple page.
   *
   * The router _controller callback, maps the path
   * 'social-commerce/simple' to this method.
   *
   * _controller callbacks return a renderable array for the content area of the
   * page. The theme system will later render and surround the content with the
   * appropriate blocks, navigation, and styling.
   */
  public function simple() {
    return array(
      '#markup' => '<p>' . $this->t('Simple page: The quick brown fox jumps over the lazy dog.') . '</p>',
    );
  }

}
