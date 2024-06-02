<?php

declare(strict_types=1);

namespace month4\Hw23\Restaurant;

use Exception;
use month4\Hw23\Interfaces\Food;
use month4\Hw23\Interfaces\FoodBuilder;

class RestaurantFoodBuilder implements FoodBuilder
{
    private Food $food;

    public function build(string $foodType, Food $food): void {
        $this->food = $food;

        switch ($foodType) {
            case 'burger':
                $this->buildBurger();
                break;
            case 'sandwich':
                $this->buildSandwich();
                break;
            case 'hotdog':
                $this->buildHotdog();
                break;
            default:
                throw new Exception("Invalid food type.");
        }
    }

    public function buildBurger(): void {
        $this->food->addIngredient('Bun');
        $this->food->addIngredient('Patty');
    }

    public function buildSandwich(): void {
        $this->food->addIngredient('Bread');
        $this->food->addIngredient('Sliced meat');
    }

    public function buildHotdog(): void {
        $this->food->addIngredient('Bun');
        $this->food->addIngredient('Sausage');
    }

    public function getFood(): Food {
        return $this->food;
    }
}