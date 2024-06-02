<?php

declare(strict_types=1);

namespace patterns\abstractFactory;

use patterns\abstractFactory\Interface\DeliveryServiceInterface;
use patterns\abstractFactory\Interface\PackageInterface;

class YandexDeliveryService implements DeliveryServiceInterface
{
    public function sendPackage(PackageInterface $package): void
    {
        echo 'Отправляем посылку через Яндекс...' . PHP_EOL;
    }
}