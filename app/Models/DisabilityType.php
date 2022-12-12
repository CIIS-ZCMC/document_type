<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisabilityType extends Model
{
    use HasFactory;
    protected $table = 'disability_types';
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
