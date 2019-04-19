<?php

namespace Kounta\Modules;

use Kounta\Interfaces\ProductPurchasedInterface;

class SupplyManager implements ProductPurchasedInterface
{
  private $pendingPurchases = [];

  private $receivedPurchases = [];

  public function getPurchasedReceivedTotal(int $productId): int
  {

  }

  public function getPurchasedPendingTotal(int $productId): int
  {

  }

  public function setPurchaseFor (int $itemId, int $orderDay): void
  {
    if (empty($this->pendingPurchases[$itemId]))
    {
      $this->pendingPurchases[$itemId] = [
        "purchase_day" => $orderDay,
        "quantity"     => 20,
        "receive_day"  => $orderDay + 2;
      ];

      return true;
    }

    return false;
  }
}
