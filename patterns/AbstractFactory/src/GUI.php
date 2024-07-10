<?php

declare(strict_types=1);

namespace patterns\abstractFactory;

interface Button
{
    public function paint(): string;
}

interface Checkbox
{
    public function paint(): string;
}

class MacButton implements Button
{
    public function paint(): string
    {
        return "Rendering a button in a Mac style.";
    }
}

class MacCheckbox implements Checkbox
{
    public function paint(): string
    {
        return "Rendering a checkbox in a Mac style.";
    }
}

class WindowsButton implements Button
{
    public function paint(): string
    {
        return "Rendering a button in a Windows style.";
    }
}

class WindowsCheckbox implements Checkbox
{
    public function paint(): string
    {
        return "Rendering a checkbox in a Windows style.";
    }
}

interface GUIFactory
{
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}

class MacFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new MacButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new MacCheckbox();
    }
}

class WindowsFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new WindowsButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new WindowsCheckbox();
    }
}

function clientCode(GUIFactory $factory)
{
    $button = $factory->createButton();
    $checkbox = $factory->createCheckbox();

    echo $button->paint() . "\n";
    echo $checkbox->paint() . "\n";
}

echo "Client: Testing client code with MacFactory:\n";
clientCode(new MacFactory());
echo "\n";

echo "Client: Testing client code with WindowsFactory:\n";
clientCode(new WindowsFactory());