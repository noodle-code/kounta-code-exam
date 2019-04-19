<?php

namespace Kounta\Modules;

include_once('./../interfaces/ProductSoldInterface.php');
include_once('./../interfaces/OrderProcessorInterface.php');

class OrderManager implements OrderProcessorInterface, ProductSoldInterface
{
  public function processFromJson(string $filePath): void
  {

  }

  public function getSoldTotal(int $productId): int
  {

  }
}
