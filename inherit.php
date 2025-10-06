<?php

class Vehicle{

    public $type;
    public $make;

    function __construct($type,$make)
    {
        $this->type = $type;
        $this->make = $make;
    }

    function display()
    {
        echo "The vehicle type is ".$this->type."and made in the year ".$this->make;
    }
}

class Car extends Vehicle{
    public $Car_Name = "HILUX";
    function displayInfo(){
        echo "The vehicle name is ".$this->Car_Name . " and the type for ".$this->make." and also of standard it follows of ".$this->type;
    }
}

$inst = new Car('commercial','bs6');

// Call the subclass method displayInfo() which exists on Car
$inst->displayInfo();
?>