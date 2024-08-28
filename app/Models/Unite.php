<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;
    protected $guarded = [""];
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'equipe_id');
    }

}
