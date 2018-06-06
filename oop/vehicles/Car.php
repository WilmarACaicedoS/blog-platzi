<?php

namespace Vehicles;

require_once 'VehicleBase.php';
require_once 'GPSTrait.php';
require_once 'LOADTrait.php';

class Car extends VehicleBase implements \Serializable {

    use GPSTrait, LOADTrait;

    public function move() {
        echo $this->startEngine(). '<br>';
        echo 'Car: moving<br>';
    }

    public function startEngine()
    {
        return "Car: start engine";
    }

    public function serialize()
    {
        echo 'Serialize c<br>';
        return $this->owner;
    }

    public function unserialize($serialized)
    {
        echo 'Unserialize c<br>';
        $this->owner = $serialized;
    }
}