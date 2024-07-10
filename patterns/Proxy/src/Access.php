<?php

declare(strict_types=1);

namespace patterns\Proxy;

interface SecureData {
    public function getData();
}

class RealSecureData implements SecureData {
    private $data;

    public function __construct() {
        $this->data = "Мега секретная инфа";
    }

    public function getData() {
        return $this->data;
    }
}

class AccessProxy implements SecureData {
    private $realSecureData;
    private $hasAccess;

    public function __construct($userRole) {
        $this->hasAccess = $this->checkAccess($userRole);
    }

    private function checkAccess($userRole) {
        return $userRole === 'admin';
    }

    public function getData() {
        if ($this->hasAccess) {
            if ($this->realSecureData === null) {
                $this->realSecureData = new RealSecureData();
            }
            return $this->realSecureData->getData();
        } else {
            return "Access Denied";
        }
    }
}

$adminProxy = new AccessProxy('admin');
echo $adminProxy->getData() . "\n";

$userProxy = new AccessProxy('user');
echo $userProxy->getData() . "\n";