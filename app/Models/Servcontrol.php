<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servcontrol extends Model
{
    use HasFactory;

    public $connection = "CONNECTION_SERVER";
    protected $table = "controls";
    protected $guarded = [];
}
