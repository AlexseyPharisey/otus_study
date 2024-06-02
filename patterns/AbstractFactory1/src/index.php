<?php

declare(strict_types=1);

namespace patterns\abstractFactory;

require __DIR__ . '/../vendor/autoload.php';

function delivery(array $factories)
{
    foreach ($factories as $factory) {
        $deliveryService = $factory->createDeliveryService();
        $package = $factory->createPackage();
        $package->getConsist();
        $deliveryService->sendPackage($package);
    }
}

$factories = [
    new SamokatDeliveryFactory(),
    new YandexDeliveryFactory(),
    new YandexDeliveryFactory(),
    new SamokatDeliveryFactory(),
];

delivery($factories);