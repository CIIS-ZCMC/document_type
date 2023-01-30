<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientBenefit extends Model
{
    
    use HasFactory;
    public function client_types()
    {
        return $this->hasMany(related:ClientType::class);

    }
    public function benefits()
    {
        return $this->hasMany(related:Benefit::class);

    }
}
