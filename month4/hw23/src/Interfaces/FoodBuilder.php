<?php

declare(strict_types=1);

namespace month4\Hw23\Interfaces;

interface FoodBuilder
{
    public function buildBurger();
    public function buildSandwich();
    public function buildHotdog();
    public function getFood();
}