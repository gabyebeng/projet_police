<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServPolicier extends Model
{
    use HasFactory;
    public $connection = "CONNECTION_SERVER";
    protected $table = "policiers";
    protected $guarded = [];
}
