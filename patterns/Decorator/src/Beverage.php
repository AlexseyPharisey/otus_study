<?php

declare(strict_types=1);

namespace patterns\beverage;

interface Beverage {
    public function getDescription(): string;
    public function cost(): float;
}


class Coffee implements Beverage {
    public function getDescription(): string {
        return "Coffee";
    }

    public function cost(): float {
        return 5.00;
    }
}

abstract class CondimentDecorator implements Beverage {
    protected $beverage;

    public function __construct(Beverage $beverage) {
        $this->beverage = $beverage;
    }

    abstract public function getDescription(): string;
}

class MilkDecorator extends CondimentDecorator {
    public function getDescription(): string {
        return $this->beverage->getDescription() . ", Milk";
    }

    public function cost(): float {
        return $this->beverage->cost() + 1.50;
    }
}

class SugarDecorator extends CondimentDecorator {
    public function getDescription(): string {
        return $this->beverage->getDescription() . ", Sugar";
    }

    public function cost(): float {
        return $this->beverage->cost() + 0.50;
    }
}

class ChocolateDecorator extends CondimentDecorator {
    public function getDescription(): string {
        return $this->beverage->getDescription() . ", Chocolate";
    }

    public function cost(): float {
        return $this->beverage->cost() + 2.00;
    }
}

$coffee = new Coffee();
echo $coffee->getDescription()
    . " $" . number_format($coffee->cost(), 2) . "\n";

$coffeeWithMilk = new MilkDecorator($coffee);
echo $coffeeWithMilk->getDescription()
    . " $" . number_format($coffeeWithMilk->cost(), 2) . "\n";

$coffeeWithMilkAndSugar = new SugarDecorator($coffeeWithMilk);
echo $coffeeWithMilkAndSugar->getDescription()
    . " $" . number_format($coffeeWithMilkAndSugar->cost(), 2) . "\n";

$coffeeWithMilkSugarAndChocolate = new ChocolateDecorator($coffeeWithMilkAndSugar);
echo $coffeeWithMilkSugarAndChocolate->getDescription()
    . " $" . number_format($coffeeWithMilkSugarAndChocolate->cost(), 2) . "\n";
