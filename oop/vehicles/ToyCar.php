<?php

namespace Vehicles;

require_once 'VehicleBase.php';
use Vehicles\VehicleBase;

class ToyCar extends VehicleBase {
    public function move() {
        echo $this->startEngine(). '<br>';
        echo 'Car: moving<br>';
    }

    protected function startEngine()
    {
        throw new \Exception('Engine not found');        
    }
}