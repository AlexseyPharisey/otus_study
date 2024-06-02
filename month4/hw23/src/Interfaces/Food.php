<?php

declare(strict_types=1);

namespace month4\Hw23\Interfaces;

interface Food
{
    public function prepare();
    public function addIngredient($ingredient);
    public function showIngredients();
}