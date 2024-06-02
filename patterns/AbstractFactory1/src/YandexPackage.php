<?php

declare(strict_types=1);

namespace patterns\abstractFactory;

use patterns\abstractFactory\Interface\PackageInterface;

class YandexPackage implements PackageInterface
{
    public function getConsist(): void
    {
        echo 'Проверяем состав посылки Яндекс...' . PHP_EOL;
    }
}