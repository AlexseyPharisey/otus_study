<?php

declare(strict_types=1);

namespace patterns\builder;

class Computer {
    private $cpu;
    private $ram;
    private $storage;
    private $gpu;

    public function setCpu($cpu) {
        $this->cpu = $cpu;
    }

    public function setRam($ram) {
        $this->ram = $ram;
    }

    public function setStorage($storage) {
        $this->storage = $storage;
    }

    public function setGpu($gpu) {
        $this->gpu = $gpu;
    }

    public function __toString() {
        return "Computer: CPU: {$this->cpu}, RAM: {$this->ram}, Storage: {$this->storage}, GPU: {$this->gpu}";
    }
}

interface ComputerBuilder {
    public function setCpu();
    public function setRam();
    public function setStorage();
    public function setGpu();
    public function getComputer();
}

class GamingComputerBuilder implements ComputerBuilder {
    private $computer;

    public function __construct() {
        $this->computer = new Computer();
    }

    public function setCpu() {
        $this->computer->setCpu("Intel Core i9");
    }

    public function setRam() {
        $this->computer->setRam("32GB DDR4");
    }

    public function setStorage() {
        $this->computer->setStorage("1TB SSD");
    }

    public function setGpu() {
        $this->computer->setGpu("NVIDIA GeForce RTX 3080");
    }

    public function getComputer() {
        return $this->computer;
    }
}

class OfficeComputerBuilder implements ComputerBuilder {
    private $computer;

    public function __construct() {
        $this->computer = new Computer();
    }

    public function setCpu() {
        $this->computer->setCpu("Intel Core i5");
    }

    public function setRam() {
        $this->computer->setRam("16GB DDR4");
    }

    public function setStorage() {
        $this->computer->setStorage("512GB SSD");
    }

    public function setGpu() {
        $this->computer->setGpu("Integrated");
    }

    public function getComputer() {
        return $this->computer;
    }
}

class ComputerDirector {
    private $builder;

    public function setBuilder(ComputerBuilder $builder) {
        $this->builder = $builder;
    }

    public function buildComputer() {
        $this->builder->setCpu();
        $this->builder->setRam();
        $this->builder->setStorage();
        $this->builder->setGpu();
    }
}

$director = new ComputerDirector();

$gamingBuilder = new GamingComputerBuilder();
$director->setBuilder($gamingBuilder);
$director->buildComputer();
$gamingComputer = $gamingBuilder->getComputer();
echo $gamingComputer . "\n";

$officeBuilder = new OfficeComputerBuilder();
$director->setBuilder($officeBuilder);
$director->buildComputer();
$officeComputer = $officeBuilder->getComputer();
echo $officeComputer . "\n";