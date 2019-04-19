<?php

namespace Kounta\Modules;

use Kounta\Interfaces\OrderProcessorInterface;
use Kounta\Interfaces\ProductSoldInterface;

class OrderManager implements OrderProcessorInterface, ProductSoldInterface
{
  public function processFromJson(string $filePath): void
  {

  }

  public function getSoldTotal(int $productId): int
  {

  }
}
