<?php

use PHPUnit\Framework\TestCase;

use Kounta\Modules\SupplyManager;
use Kounta\Constants\Products;
use Kounta\Constants\Days;

class SupplyManagerTest extends TestCaese
{
  private $supplyManager;

  public function setUp()
  {
    if (empty($supplyManager))
    {
      $this->supplyManager = new SupplyManager();
    }
  }

  public function testShouldReceiveOrderOnWednesdayWhenAMondayPurchaseForBrowniesIsDone ()
  {
    $expected = [
      "purchase_day"  => Days::MONDAY,
      "quantity"      => 20,
      "receive_day"   => Days::WEDNESDAY
    ];

    $this->assertTrue($this->supplyManager->setPurchaseFor(Products::BROWNIE, Days::MONDAY));
    $this->assertEquals($expected, $this->supplyManager->getPurchaseFor(Products::BROWNIE));
  }

  public function testShouldRejectAnotherPurchaseOfBrowniesOnTueday ()
  {
    $expected = [
      "purchase_day"  => Days::MONDAY,
      "quantity"      => 20,
      "receive_day"   => Days::WEDNESDAY
    ];

    $this->assertFalse($this->supplyManager->setPurchaseFor(Products::BROWNIE, Days::TUESDAY));
    $this->assertEquals($expected, $this->supplyManager->getPurchaseFor(Products::BROWNIE));
  }
}
