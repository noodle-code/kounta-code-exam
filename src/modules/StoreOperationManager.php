<?php

namespace Kounta\Modules;

class StoreOperationManager {

  public function __construct ()
  {
    // Initialize all sub manager classes.
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
    $startIndex = array_search($day, $this->weekDays);

    if ($startDay !== false)
    {
      $this->startDayIndex = $startIndex;
    }
    else
    {
      // Print an error message.
      print_r('Received invalid day value.');
    }
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
