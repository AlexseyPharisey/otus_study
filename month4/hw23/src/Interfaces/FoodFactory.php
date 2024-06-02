<?php

declare(strict_types=1);

namespace month4\Hw23\Interfaces;

interface FoodFactory
{
    public function createBurger();
    public function createSandwich();
    public function createHotdog();
}