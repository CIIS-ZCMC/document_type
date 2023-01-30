<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;
    public function benefit_requirements()
    {
        return $this->belongsTo(BenefitRequirement::class);
    }

    public function client_benefits()
    {
        return $this->belongsTo(ClientBenefit::class);
    }

    
}
