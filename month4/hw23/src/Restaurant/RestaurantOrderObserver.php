<?php

declare(strict_types=1);

namespace month4\Hw23\Restaurant;

use month4\Hw23\Interfaces\OrderObserver;

class RestaurantOrderObserver implements OrderObserver
{
    public function update($orderStatus): void
    {
        echo "Order status updated: " . $orderStatus . PHP_EOL;
    }
}