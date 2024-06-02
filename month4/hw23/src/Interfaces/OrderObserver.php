<?php

declare(strict_types=1);

namespace month4\Hw23\Interfaces;

interface OrderObserver
{
    public function update($orderStatus): void;
}