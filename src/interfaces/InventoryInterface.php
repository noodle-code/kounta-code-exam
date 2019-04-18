<?php

interface InventoryInterface
{
    /**
     * @param int $productId
     * @return int
     */
    public function getStockLevel(int $productId): int;

    public function decreaseItemStock (int $itemId, int $quantity): void;

    public function addItemStock (int $itemId, int $quantity): void
}
