<?php

use PHPUnit\Framework\TestCase;

use Kounta\Modules\SupplyManager;
use Kounta\Constants\Products;
use Kounta\Constants\Days;

class SupplyManagerTest extends TestCase
{
  private $supplyManager;

  public function setUp()
  {
    if (empty($supplyManager))
    {
      $this->supplyManager = new SupplyManager();
    }
  }

  public function testShouldReceiveNoSupplyOnFreshInstance ()
  {
    $receivedSupply = [];
    $this->assertEquals($receivedSupply, $this->supplyManager->receivePurchases(Days::MONDAY));
  }

  public function testShouldAddPurchaseForBrowniesOnMondayDueOnWednesday ()
  {
    $this->assertTrue($this->supplyManager->setPurchaseFor(Products::BROWNIE, Days::MONDAY));
    $this->assertEquals(20, $this->supplyManager->getPurchasedPendingTotal(Products::BROWNIE));
  }

  public function testShouldAddPurchaseForCroissantsOnMondayDueOnWednesday ()
  {
    $this->assertTrue($this->supplyManager->setPurchaseFor(Products::CROISSANT, Days::MONDAY));
    $this->assertEquals(20, $this->supplyManager->getPurchasedPendingTotal(Products::CROISSANT));
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

    $this->assertEquals($pendingPurchases, $this->supplyManager->getAllPending(Products::CROISSANT));
  }

  public function testShouldRejectAnotherPurchaseOfBrowniesOnTuesday ()
  {
    $this->assertFalse($this->supplyManager->setPurchaseFor(Products::BROWNIE, Days::TUESDAY));
    $this->assertEquals(20, $this->supplyManager->getPurchasedPendingTotal(Products::BROWNIE));
  }

  public function testShouldReceiveMondayPurchasesOnWednesday ()
  {
    $expectedReceive = [
      1 => 20,
      4 => 20
    ];

    $this->assertEquals($expectedReceive, $this->supplyManager->receivePurchases(Days::WEDNESDAY));
    $this->assertEquals($expectedReceive[Products::BROWNIE], $this->supplyManager->getPurchasedReceivedTotal(Products::BROWNIE));
    $this->assertEquals($expectedReceive[Products::CROISSANT], $this->supplyManager->getPurchasedReceivedTotal(Products::CROISSANT));
  }
}
