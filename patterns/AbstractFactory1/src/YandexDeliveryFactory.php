<?php

declare(strict_types=1);

namespace patterns\abstractFactory;

use patterns\abstractFactory\Interface\AbstractFactoryInterface;
use patterns\abstractFactory\Interface\DeliveryServiceInterface;
use patterns\abstractFactory\Interface\PackageInterface;

class YandexDeliveryFactory implements AbstractFactoryInterface
{
    public function createDeliveryService(): DeliveryServiceInterface
    {
        return new YandexDeliveryService();
    }

    public function createPackage(): PackageInterface
    {
        return new YandexPackage();
    }
}