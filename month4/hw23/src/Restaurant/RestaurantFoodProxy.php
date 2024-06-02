<?php

declare(strict_types=1);

namespace month4\Hw23\Restaurant;

use month4\Hw23\Interfaces\Food;
use month4\Hw23\Interfaces\FoodProxy;

class RestaurantFoodProxy implements FoodProxy {
    private $food;

    public function setFood(Food $food): void
    {
        $this->food = $food;
    }

    public function prepareFood(): void
    {
        if (!$this->isStandard()) {
            $this->utilize();
        } else {
            $this->food->prepare();
            $this->food->showIngredients();
        }
    }

    private function isStandard(): bool
    {
        return true;
    }

    private function utilize(): void
    {
        echo "Utilizing the food" . PHP_EOL;
    }
}