<?php

declare(strict_types=1);

namespace month4\Hw23;

use Exception;
use month4\Hw23\Restaurant\RestaurantFoodBuilder;
use month4\Hw23\Restaurant\RestaurantFoodFactory;
use month4\Hw23\Restaurant\RestaurantFoodProxy;
use month4\Hw23\Restaurant\RestaurantOrderIterator;
use month4\Hw23\Restaurant\RestaurantOrderObserver;

require __DIR__ . '/../vendor/autoload.php';

class Index {

    const FOOD_TYPES = ['burger', 'sandwich', 'hotdog'];

    private RestaurantFoodFactory $factory;
    private RestaurantFoodBuilder $builder;
    private RestaurantFoodProxy $proxy;
    private RestaurantOrderObserver $observer;
    private RestaurantOrderIterator $iterator;

    public function __construct()
    {
        $this->factory = new RestaurantFoodFactory();
        $this->builder = new RestaurantFoodBuilder();
        $this->proxy = new RestaurantFoodProxy();
        $this->observer = new RestaurantOrderObserver();
        $this->iterator = new RestaurantOrderIterator();
    }

    /**
     * @throws Exception
     */
    public function run(): void
    {
        $foodTypes = self::FOOD_TYPES;
        foreach ($foodTypes as $foodType) {
            $food = match ($foodType) {
                'burger' => $this->factory->createBurger(),
                'sandwich' => $this->factory->createSandwich(),
                'hotdog' => $this->factory->createHotdog(),
                default => throw new Exception("Invalid food type."),
            };

            $status = $this->iterator->current();
            $this->observer->update($status['status']);

            $this->builder->build($foodType, $food);
            $food = $this->builder->getFood();

            $this->proxy->setFood($food);
            $this->proxy->prepareFood();

            echo PHP_EOL;
        }
        $this->iterator->next();

        while ($this->iterator->hasNext()) {
            $order = $this->iterator->current();
            echo "Order status: " . $order['status'] . PHP_EOL;
            $this->iterator->next();
        }
    }
}

$index = new Index();
$index->run();