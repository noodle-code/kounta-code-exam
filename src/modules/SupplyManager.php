<?php

namespace Kounta\Modules;

use Kounta\Interfaces\ProductsPurchasedInterface;

class SupplyManager implements ProductsPurchasedInterface
{
  private $pendingPurchases = [];

  private $receivedPurchases = [];

  public function getPurchasedReceivedTotal(int $productId): int
  {

  }

  public function getPurchasedPendingTotal(int $productId): int
  {

  }

  public function setPurchaseFor (int $itemId, int $orderDay): boolean
  {
    if (empty($this->pendingPurchases[$itemId]))
    {
      $this->pendingPurchases[$itemId] = [
        "purchase_day" => $orderDay,
        "quantity"     => 20,
        "receive_day"  => $orderDay + 2
      ];

      return true;
    }

    return false;
  }

  public function receivePurchases (int $dayId): array
  {
    $receive = [];

    foreach($this->pendingPurchases as $item => $order)
    {
      if ($order['receive_day'] === $dayId)
      {
        $receive[$item] = $order['quantity'];
        $receivedPurchases[$item][] = $order;
      }
    }

    return $receive;
  }
}
