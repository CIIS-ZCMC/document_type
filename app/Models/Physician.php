<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physician extends Model
{
    use HasFactory;
    protected $table = 'physicians';
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
