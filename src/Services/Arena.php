<?php

namespace App\Services;

use App\Entity\Knight;

class Arena
{
    public function fight(Knight $knight1, Knight $knight2)
    {
        $knight1PowerLevel = $knight1->calculatePowerLevel();
        $knight2PowerLevel = $knight2->calculatePowerLevel();

        $duelResult = $knight1PowerLevel - $knight2PowerLevel;
        if ($duelResult > 0) {
            return 1;
        } elseif ($duelResult < 0) {
            return -1;
        }

        return 0;
    }
}
