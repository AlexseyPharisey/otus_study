<?php

namespace patterns\AbstractFactory2;

use patterns\AbstractFactory2\interfaces\AbstractMeat;

class MeatProductType1 implements AbstractMeat
{
    public function getNameMeat(): string
    {
        return 'Колбаса';
    }
}