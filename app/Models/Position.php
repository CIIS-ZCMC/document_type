<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
     

    ];
    public function personnels()
    {
        return $this->belongsTo(Personnel::class);

    }


  
}
