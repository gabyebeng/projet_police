<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
        

class Policier extends Model
{
    use HasFactory;
    // use Searchable;
    protected $guarded=[''];

    public function unite(){
        return $this->belongsTo(Unite::class, 'unite_id');
    }
    public function control(){
        return $this->hasMany(Control::class, 'control_id');
    }
}
