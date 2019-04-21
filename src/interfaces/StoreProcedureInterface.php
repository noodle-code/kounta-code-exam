<?php

namespace Kounta\Interfaces;

use Kounta\Modules\WeekIterator;
use Kounta\Modules\InventoryManager;
use Kounta\Modules\OrderManager;
use Kounta\Modules\SupplyManager;

interface StoreProcedureInterface
{
  public function setWeekIterator (WeekIterator $weekIterator): void;

  public function setOrderManager (OrderManager $orderManager): void;

  public function setInventoryManager (InventoryManager $inventoryManager): void;

  public function setSupplyManager (SupplyManager $supplyManager): void;
}
