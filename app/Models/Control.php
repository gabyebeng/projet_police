<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;
    protected $guarded = [""];

    public function policier()
    {
        return $this->belongsTo(Policier::class, 'policier_id');
    }
    public function unite()
    {
        return $this->belongsTo(Unite::class, 'unite_id');
    }
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'equipe_id');
    }
}
