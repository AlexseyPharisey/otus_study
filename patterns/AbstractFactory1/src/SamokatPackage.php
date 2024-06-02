<?php

declare(strict_types=1);

namespace patterns\abstractFactory;

use patterns\abstractFactory\Interface\PackageInterface;

class SamokatPackage implements PackageInterface
{
    public function getConsist(): void
    {
        echo 'Проверяем состав посылки Самокат...' . PHP_EOL;
    }
}