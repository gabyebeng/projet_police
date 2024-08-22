<?php

namespace App\Helpers;

use App\Models\Equipe;
use App\Models\User;

class ConfigHelper
{
    public static function getTotalUser()
    {
        $totalUser = User::all()->count();
        return $totalUser;
    }
    public static function getTotalEquipe()
    {
        $totalEquipe = Equipe::all()->count();
        return $totalEquipe;
    }
}

