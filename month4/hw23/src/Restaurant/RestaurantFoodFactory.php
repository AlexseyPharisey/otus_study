<?php

declare(strict_types=1);

namespace month4\Hw23\Restaurant;

use month4\Hw23\Foods\Burger;
use month4\Hw23\Foods\HotDog;
use month4\Hw23\Foods\Sandwich;
use month4\Hw23\Interfaces\FoodFactory;

class RestaurantFoodFactory implements FoodFactory
{

    public function createBurger(): Burger
    {
        return new Burger();
    }

    public function createSandwich(): Sandwich
    {
        return new Sandwich();
    }

    public function createHotdog(): HotDog
    {
        return new HotDog();
    }
}