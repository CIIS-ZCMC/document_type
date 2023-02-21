<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    public function benefit_requirements()
    {
        return $this->belongsTo(BenefitRequirement::class);
    }

    public function client_benefits()
    {
        return $this->belongsTo(ClientBenefit::class);
    }

    
>>>>>>> e0ca9b07f2586483b6a5624bdc458726b4264e15
}
