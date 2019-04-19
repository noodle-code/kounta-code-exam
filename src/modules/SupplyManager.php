<?php

namespace Kounta\Modules;

use Kounta\Interfaces\ProductPurchasedInterface;

class SupplyManager implements ProductPurchasedInterface
{
  public function getPurchasedReceivedTotal(int $productId): int
  {

  }

  public function getPurchasedPendingTotal(int $productId): int
  {

  }
}
