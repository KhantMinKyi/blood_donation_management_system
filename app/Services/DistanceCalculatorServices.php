<?php

namespace App\Services;

class DistanceCalculatorServices
{
    public function generateKilometer($lat1, $long1, $lat2, $long2)
    {
        //Using Spherical Law of Cosines
        if (($lat1 == $lat2) && ($long1 == $long2)) {
            return 0;
        } else {
            $theta = $long1 - $long2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            return ($miles * 1.609344);
        }
    }
}
