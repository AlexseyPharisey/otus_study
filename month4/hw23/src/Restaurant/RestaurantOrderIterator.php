<?php

declare(strict_types=1);

namespace month4\Hw23\Restaurant;

use Iterator;

class RestaurantOrderIterator implements Iterator
{
    const POSITION_DEFAULT_VALUE = 0;

    private array $orders;
    private int $position = self::POSITION_DEFAULT_VALUE;

    public function __construct() {
        $this->orders = $this->orderStatuses();
    }

    private function orderStatuses(): array
    {
        return [
            ['status' => 'accepted'],
            ['status' => 'preparing'],
            ['status' => 'ready'],
        ];
    }

    public function rewind(): void
    {
        $this->position = self::POSITION_DEFAULT_VALUE;
    }

    public function current(): array
    {
        return $this->orders[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->orders[$this->position]);
    }

    public function hasNext(): bool
    {
        return isset($this->orders[$this->position]);
    }
}