<?php

namespace Drupal\commerce_checkout\Plugin\Commerce\CheckoutFlow;

/**
 * Defines the interface for checkout flows which have panes.
 */
interface CheckoutFlowWithPanesInterface extends CheckoutFlowInterface {

  /**
   * Gets the checkout flow's panes.
   *
   * @param string $step_id
   *   (Optional) The step ID to filter on.
   *
   * @return \Drupal\commerce_checkout\Plugin\Commerce\CheckoutPane\CheckoutPaneInterface[]
   *   The panes, keyed by pane id, ordered by weight.
   */
  public function getPanes($step_id = NULL);

  /**
   * Gets a pane with the given ID.
   *
   * @param string $pane_id
   *   The pane ID.
   *
   * @return \Drupal\commerce_checkout\Plugin\Commerce\CheckoutPane\CheckoutPaneInterface|null
   *   The pane, or NULL if not found.
   */
  public function getPane($pane_id);

}
