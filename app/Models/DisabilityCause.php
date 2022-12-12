<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisabilityCause extends Model
{
    use HasFactory;
    protected $table = 'disability_causes';
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
