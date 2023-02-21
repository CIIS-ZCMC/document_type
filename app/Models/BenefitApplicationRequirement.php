<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitApplicationRequirement extends Model
{
    use HasFactory;
    public function benefit_applications()
    {
        return $this->belongsTo(related:BenefitApplication::class);
    }
}
