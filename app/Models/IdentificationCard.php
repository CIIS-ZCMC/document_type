<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificationCard extends Model
{
    use HasFactory;
    protected $table = 'identification_cards';
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
