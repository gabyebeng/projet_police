<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServUnite extends Model
{
    use HasFactory;

    public $connection = "CONNECTION_SERVER";
    protected $table = "unites";
    protected $guarded = [];
}
