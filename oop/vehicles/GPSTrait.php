<?php

namespace Vehicles;

trait GPSTrait {
    public function getPos() {
        return 'lat, long';
    }

    public function getLat() {
        return 'lat';
    }
}