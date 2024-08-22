<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'user_id',
    ];

    public function unite(){
        return $this->hasMany(Unite::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function mission(){
        return $this->hasMany(Mission::class);
    }
}
