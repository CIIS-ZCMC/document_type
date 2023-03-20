<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitSchedule extends Model
{
    use HasFactory;
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
