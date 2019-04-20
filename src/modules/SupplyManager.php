<?php

namespace Kounta\Modules;

use Kounta\Interfaces\ProductsPurchasedInterface;

class SupplyManager implements ProductsPurchasedInterface
{
  private $pendingPurchases = [];

  private $receivedPurchases = [];

  public function getPurchasedReceivedTotal(int $productId): int
  {
    $total = 0;

    if ($this->receivedPurchases[$productId])
    {
      foreach($this->receivedPurchases[$productId] as $itemReceiveLog)
      {
        $total += $itemReceiveLog['quantity'];
      }
    }

    return $total;
  }

  public function getPurchasedPendingTotal(int $productId): int
  {
    $total = 0;

    if ($this->pendingPurchases[$productId])
    {
      foreach($this->pendingPurchases[$productId] as $itemReceiveLog)
      {
        $total += $itemReceiveLog['quantity'];
      }
    }

    return $total;
  }

  public function setPurchaseFor (int $itemId, int $orderDay): bool
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
