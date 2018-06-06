<?php

namespace Vehicles;

abstract class VehicleBase
{
    protected $owner;

    public function __construct($ownerName)
    {
        $this->owner = $ownerName;
        echo 'construct<br>';
    }

    public function move() {
        echo $this->getDate();
        echo $this->startEngine() . '<br>';
        echo 'moving<br>';
    }

    public function getOwner() {
        return $this->owner;
    }

    public function setOwner($owner) {
        $this->owner = $owner;
    }

    protected abstract function startEngine();

    private function getDate() {
        return date("Y-m-d H:i:s");
    }
}