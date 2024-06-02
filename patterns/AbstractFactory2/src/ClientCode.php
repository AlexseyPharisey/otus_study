<?php

namespace patterns\AbstractFactory2;

use patterns\AbstractFactory2\interfaces\AbstractFactory;

require __DIR__ . '/../vendor/autoload.php';

class ClientCode
{
    public function clientCode(AbstractFactory $factory): void
    {
        $productMilk = $factory->createProductMilk();
        $productMeat = $factory->createProductMeat();

        echo $productMilk->getNameMilk() . PHP_EOL;
        echo $productMeat->getNameMeat() . PHP_EOL;
    }
}

$clientCode = new ClientCode();

echo 'Фабрика 1' . PHP_EOL;
$clientCode->clientCode(new FactoryType2());

echo PHP_EOL;

echo 'Фабрика 2' . PHP_EOL;
$clientCode->clientCode(new FactoryType1());