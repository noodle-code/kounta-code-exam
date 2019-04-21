<?php

namespace Kounta\Modules;

use Kounta\Interfaces\StoreProcedureInterface;

class StoreOperationManager implements StoreProcedureInterface
{
  private $weekIterator;
  private $supplyManager;
  private $orderManager;
  private $inventoryManager;

  public function setWeekIterator (WeekIterator $weekIterator): void
  {
    $this->weekIterator = $weekIterator;
  }

  public function setSupplyManager (SupplyManager $supplyManager): void
  {
    $this->supplyManager = $supplyManager;
  }

  public function setOrderManager (OrderManager $orderManager): void
  {
    $this->orderManager = $orderManager;
  }

  public function setInventoryManager (InventoryManager $inventoryManager): void
  {
    $this->inventoryManager = $inventoryManager;
  }

  /**
   * Set the starting day of the store operations. Prints an error message when
   * an invalid day name string is provided.
   * @param string $day Day string on which the store operation should start.
   *                    Values are limited to: sun, mon, tue, wed, thu,
   *                    fri, and sat.
   */
  public function startOn (string $day): void
  {

  }

  /**
   * Start business operation on specified start day index.
   * @return void
   */
  public function openStore (): void
  {
    // Parse orders-sample.json

    // Iterate on week days.
      // Call start Procedures to carry out day to day tasks
  }

  /**
   * Carry out store procedures for the day.
   * @param array $order An array of orders to be fulfilled within the day.
   * @return void
   */
  private function startProcedures (array $order): void
  {
    // Receive orders on start of day
    // Process given order
    // Check stocks and place order for items with critical stocks
  }

  /**
   * Print a report summary about the stocks and sales.
   */
  private function printOperationReport (): void
  {

  }
}
