<?php

declare(strict_types=1);

namespace patterns\abstractFactory;

use patterns\abstractFactory\Interface\AbstractFactoryInterface;
use patterns\abstractFactory\Interface\DeliveryServiceInterface;
use patterns\abstractFactory\Interface\PackageInterface;

class SamokatDeliveryFactory implements AbstractFactoryInterface
{

    public function createDeliveryService(): DeliveryServiceInterface
    {
        return new SamokatDeliveryService();
    }

    public function createPackage(): PackageInterface
    {
        return new SamokatPackage();
    }
}