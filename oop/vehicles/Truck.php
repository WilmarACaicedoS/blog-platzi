<?php 

namespace Vehicles;

require_once 'VehicleBase.php';
use Vehicles\VehicleBase;

class Truck extends VehicleBase {
    private static $count = 0;
    private $type;

    public function __construct($ownerName, $type)
    {
        $this->type = $type;
        //parent::__construct($ownerName);
        $this->owner = $ownerName;
        self::$count++;
    }

    /*public function move() {
        echo 'Truck ' . $this->type . ': moving<br>';
    }*/

    public function getTotal() {
        return self::$count;
    }

    public function startEngine()
    {
        return "Truck: start engine";
    }
}