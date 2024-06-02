<?php

namespace patterns\AbstractFactory2;

use patterns\AbstractFactory2\interfaces\AbstractMilk;

class MilkProductType1 implements AbstractMilk
{
    public function getNameMilk(): string
    {
        return 'Молоко';
    }
}