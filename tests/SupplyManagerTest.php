<?php

use PHPUnit\Framework\TestCase;

use Kounta\Modules\SupplyManager;
use Kounta\Constants\Products;
use Kounta\Constants\Days;

class SupplyManagerTest extends TestCase
{
  private static $supplyManager;

  public function setUp()
  {
    if (empty(self::$supplyManager))
    {
      self::$supplyManager = new SupplyManager();
    }
  }

  public function testShouldReceiveNoSupplyOnFreshInstance ()
  {
    $receivedSupply = [];
    $this->assertEquals($receivedSupply, self::$supplyManager->receivePurchases(Days::MONDAY));
  }

  public function testShouldAddPurchaseForBrowniesOnMondayDueOnWednesday ()
  {
    $this->assertTrue(self::$supplyManager->setPurchaseFor(Products::BROWNIE, Days::MONDAY));
    $this->assertEquals(20, self::$supplyManager->getPurchasedPendingTotal(Products::BROWNIE));
  }

  public function testShouldAddPurchaseForCroissantsOnMondayDueOnWednesday ()
  {
    $this->assertTrue(self::$supplyManager->setPurchaseFor(Products::CROISSANT, Days::MONDAY));
    $this->assertEquals(20, self::$supplyManager->getPurchasedPendingTotal(Products::CROISSANT));
  }

  public function testShouldGetAllPendingPurchases ()
  {
    $pendingPurchases = [
      1 => [
        "purchase_day"  => Days::MONDAY,
        "quantity"      => 20,
        "receive_day"   => Days::WEDNESDAY
      ],
      4 => [
        "purchase_day"  => Days::MONDAY,
        "quantity"      => 20,
        "receive_day"   => Days::WEDNESDAY
      ]
    ];

    $this->assertEquals($pendingPurchases, self::$supplyManager->getAllPending());
  }

  public function testShouldRejectAnotherPurchaseOfBrowniesOnTuesday ()
  {
    $this->assertFalse(self::$supplyManager->setPurchaseFor(Products::BROWNIE, Days::TUESDAY));
    $this->assertEquals(20, self::$supplyManager->getPurchasedPendingTotal(Products::BROWNIE));
  }

  public function testShouldReceiveMondayPurchasesOnWednesday ()
  {
    $expectedReceive = [
      1 => 20,
      4 => 20
    ];

    $this->assertEquals($expectedReceive, self::$supplyManager->receivePurchases(Days::WEDNESDAY));
    $this->assertEquals($expectedReceive[Products::BROWNIE], self::$supplyManager->getPurchasedReceivedTotal(Products::BROWNIE));
    $this->assertEquals($expectedReceive[Products::CROISSANT], self::$supplyManager->getPurchasedReceivedTotal(Products::CROISSANT));
  }
}
