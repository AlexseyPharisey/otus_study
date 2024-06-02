<?php

declare(strict_types=1);

namespace patterns\AbstractFactory2\interfaces;

interface AbstractFactory
{
    public function createProductMilk(): AbstractMilk;

    public function createProductMeat(): AbstractMeat;
}