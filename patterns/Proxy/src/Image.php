<?php

declare(strict_types=1);

namespace patterns\Proxy;

interface Image {
    public function display();
}

class RealImage implements Image {
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
        $this->loadFromDisk();
    }

    private function loadFromDisk() {
        echo "Loading " . $this->filename . "\n";
    }

    public function display() {
        echo "Displaying " . $this->filename . "\n";
    }
}

class ProxyImage implements Image {
    private $realImage;
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function display() {
        if ($this->realImage === null) {
            $this->realImage = new RealImage($this->filename);
        }
        $this->realImage->display();
    }
}

$image = new ProxyImage("test_image.jpg");

$image->display();
$image->display();