<?php

include_once('./../interfaces/ProductPurchasedInterface.php');

class SupplyManager implements ProductPurchasedInterface
{
  public function getPurchasedReceivedTotal(int $productId): int
  {

  }

  public function getPurchasedPendingTotal(int $productId): int
  {

  }
}
