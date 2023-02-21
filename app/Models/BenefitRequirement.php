<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitRequirement extends Model
{
    use HasFactory;
    public function requirements()
    {
        return $this->hasMany(related:Requirement::class);

    }
    public function benefits()
    {
        return $this->hasMany(related:Benefit::class);

    }
}
