<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyComposition extends Model
{
    use HasFactory;
    protected $table = 'family_compositions';
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
