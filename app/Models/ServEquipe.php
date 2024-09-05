<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServEquipe extends Model
{
    use HasFactory;
    public $connection = "CONNECTION_SERVER";
    protected $table = "equipes";
    protected $guarded = [];
}
