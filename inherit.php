<?php

// Vehicle: base class with two properties and a constructor
class Vehicle {
    public $type; // e.g. 'commercial'
    public $make; // e.g. 'bs6'

    // Initialize properties
    function __construct($type, $make)
    {
        $this->type = $type;
        $this->make = $make;
    }

    // Print a short description
    function display()
    {
        echo "The vehicle type is " . $this->type . " and made in the year " . $this->make;
    }
}


// Car: subclass of Vehicle with an additional property and method
class Car extends Vehicle {
    public $Car_Name = "HILUX"; // default name

    // Print detailed info using inherited properties
    function displayInfo()
    {
        echo "The vehicle name is " . $this->Car_Name
            . " and the type is " . $this->make
            . " (" . $this->type . ")";
    }
}


// Demo: instantiate Car and call displayInfo()
$inst = new Car('commercial', 'bs6');
$inst->displayInfo();

?>