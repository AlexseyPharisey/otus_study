<?php

namespace patterns\AbstractFactory2;

use patterns\AbstractFactory2\interfaces\AbstractMeat;

class MeatProductType2 implements AbstractMeat
{
    public function getNameMeat(): string
    {
        return 'Сосиска';
    }
}