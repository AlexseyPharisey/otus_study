<?php

namespace patterns\AbstractFactory2;

use patterns\AbstractFactory2\interfaces\AbstractFactory;
use patterns\AbstractFactory2\interfaces\AbstractMilk;
use patterns\AbstractFactory2\interfaces\AbstractMeat;

class FactoryType2 implements AbstractFactory
{
    public function createProductMilk(): AbstractMilk
    {
        return new MilkProductType1();
    }

    public function createProductMeat(): AbstractMeat
    {
        return new MeatProductType1();
    }
}