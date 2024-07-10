<?php

declare(strict_types=1);

namespace patterns\observer;

interface Observer
{
    public function update(float $temperature);
}

interface Subject
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
    public function getTemperature(): float;
    public function setTemperature(float $temperature);
}

class Temperature implements Subject
{
    private $observers = [];
    private $temperature;

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature);
        }
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature)
    {
        $this->temperature = $temperature;
        $this->notify();
    }
}

class TemperatureDisplay implements Observer
{
    public function update(float $temperature)
    {
        echo "Current temperature is: {$temperature} degrees Celsius\n";
    }
}

$temperatureSensor = new Temperature();
$display = new TemperatureDisplay();

$temperatureSensor->attach($display);
$temperatureSensor->setTemperature(25.5);
$temperatureSensor->setTemperature(30.0);
$temperatureSensor->detach($display);
$temperatureSensor->setTemperature(27.5);