<?php

declare(strict_types=1);

namespace patterns\abstractFactory\Interface;
interface AbstractFactoryInterface
{
    public function createDeliveryService(): DeliveryServiceInterface;
    public function createPackage(): PackageInterface;
}