<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientType extends Model
{
    use HasFactory;
    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'client_benefits');
    }
}
