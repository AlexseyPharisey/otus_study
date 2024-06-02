<?php

namespace patterns\AbstractFactory2;

use patterns\AbstractFactory2\interfaces\AbstractMilk;

class MilkProductType2 implements AbstractMilk
{
    public function getNameMilk(): string
    {
        return 'Творог';
    }
}