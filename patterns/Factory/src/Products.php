<?php

declare(strict_types=1);

namespace patterns\factory;

interface Product
{
    public function getName(): string;
}

class ConcreteProductA implements Product
{
    public function getName(): string
    {
        return "Product A";
    }
}

class ConcreteProductB implements Product
{
    public function getName(): string
    {
        return "Product B";
    }
}

//----------------------------------------------------

abstract class Creator
{
    abstract public function factoryMethod(): Product;

    public function someOperation(): string
    {
        $product = $this->factoryMethod();
        return "Creator: The same creator's code has just worked with " . $product->getName();
    }
}

class ConcreteCreatorA extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProductA();
    }
}

class ConcreteCreatorB extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProductB();
    }
}

//---------------------------------------------------------

function clientCode(Creator $creator)
{
    echo "Client: I'm not aware of the creator's class, but it still works.\n" . $creator->someOperation();
}

echo "App: Launched with the ConcreteCreatorA.\n";
clientCode(new ConcreteCreatorA());
echo "\n\n";

echo "App: Launched with the ConcreteCreatorB.\n";
clientCode(new ConcreteCreatorB());