<?php

declare(strict_types=1);

namespace patterns\strategy;

interface Transport
{
    public function start(): void;
    public function stop(): void;
    public function repair(): void;
    public function getInfo(): void;
    public function operate(): void;
}

class Bike implements Transport {
    public function start(): void {
        echo "Bike started\n";
    }

    public function stop(): void {
        echo "Bike stopped\n";
    }

    public function repair(): void {
        echo "Bike repair\n";
    }

    public function getInfo(): void {
        echo "Transport type: Bike\n";
        echo "Number of wheels: 2\n";
        echo "Average Weight: 700 Pounds\n";
    }

    public function operate(): void {
        echo "Riding Bike ............\n";
    }
}

class Car implements Transport {
    public function start(): void {
        echo "Car started\n";
    }

    public function stop(): void {
        echo "Car stopped\n";
    }

    public function repair(): void {
        echo "Car repair\n";
    }

    public function getInfo(): void {
        echo "Transport type: Car\n";
        echo "Number of wheels: 4\n";
        echo "Average Weight: 4,000 Pounds\n";
    }

    public function operate(): void {
        echo "Driving car ............\n";
    }
}

class Plane implements Transport {
    public function start(): void {
        echo "Plane started\n";
    }

    public function stop(): void {
        echo "Plane stopped\n";
    }

    public function repair(): void {
        echo "Plane repair\n";
    }

    public function getInfo(): void {
        echo "Transport type: Plane\n";
        echo "Number of wheels: 3\n";
        echo "Average Weight: 50,000 Pounds\n";
    }

    public function operate(): void {
        echo "Flying plane ............\n";
    }
}

class TransportStrategy {
    public function __construct(private Transport $transport) {
    }

    public function setStrategy(Transport $transport) {
        $this->transport = $transport;
    }

    public function execute(): void {
        $this->transport->start();

        $this->transport->getInfo();

        $this->transport->operate();
    }

    public function repair(): void {
        $this->transport->repair();
    }

    public function stop(): void {
        $this->transport->stop();
    }
}

echo PHP_EOL;
echo "Operating Bike:\n";

$myTransport = new TransportStrategy(new Bike());
$myTransport->execute();
$myTransport->stop();

echo PHP_EOL;
echo "Operating Car:\n";

$myTransport->setStrategy(new Car());
$myTransport->execute();
$myTransport->stop();
$myTransport->repair();

echo PHP_EOL;
echo "Operating plane:\n";

$myTransport = new TransportStrategy(new Plane());
$myTransport->execute();
$myTransport->stop();
