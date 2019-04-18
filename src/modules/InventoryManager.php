<?php
includes('./../interfaces/InventoryInterface.php');

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

  public function getItemStock (int $itemId, int $quantity): void
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

  public function isItemUnderStock (int $itemId): boolean
  {
    if ($this->items[$itemId] && $this->items[$itemId] < $this->stockThreshhold)
    {
      return true;
    }

    return false;
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
