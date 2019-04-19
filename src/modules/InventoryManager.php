<?php

namespace Kounta\Modules;

use Kounta\Interfaces\InventoryInterface;

class InventoryManager implements InventoryInterface
{
  private $items = [
    1 => 20,
    2 => 20,
    3 => 20,
    4 => 20,
    5 => 20
  ];

  private $dayReport = [];

  private $stockThreshhold = 10;

  public function decreaseItemStock (int $itemId, int $quantity): void
  {
    if ($this->items[$itemId])
    {
      // If stocks number is greater than quantity then normally subtract
      // quantity from item stock number. Otherwise set the item stock number
      // to 0. This is to avoid negative values on stock numbers.
      if ($this->items[$itemId] > $quantity)
      {
        $this->items[$itemId] = $this->items[$itemId] - $quantity;
      }
      else
      {
        $this->items[$itemId] = 0;
      }
    }
    else
    {
      print_r("Error: Unknown item.")
    }
  }

  public function addItemStock (int $itemId, int $quantity): void
  {
    if ($this->items[$itemId])
    {
      $this->items[$itemId] = $this->items[$itemId] + $quantity;
    }
    else
    {
      print_r("Error: Unknown item.")
    }
  }

  public function logActivity (): void
  {

  }
}
