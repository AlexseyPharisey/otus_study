<?php

declare(strict_types=1);

namespace month4\Hw23\Foods;

use month4\Hw23\Interfaces\Food;

class Burger implements Food
{
    private array $ingredients = [];

    public function addIngredient($ingredient): void
    {
        $this->ingredients[] = $ingredient;
    }

    public function showIngredients(): void
    {
        echo 'Adding ingredients: ' . implode(', ', $this->ingredients) . PHP_EOL;

    }

    public function prepare(): void
    {
        echo "Preparing a burger" . PHP_EOL;
    }
}