<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitApplication extends Model
{
    use HasFactory;
    protected $table = 'benefit_applications';

     
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
    public function benefit_application_requirements()
    {
        return $this->hasMany(related:BenefitApplicationRequirement::class);

    }
    public function client_cards()
    {
        return $this->belongsTo(related:ClientCard::class);
    }
    // public function benefit_requirements()
    // {
    //     return $this->hasMany(related:BenefitRequirement::class);

    // }
    public function decline_benefits()
    {
        return $this->hasMany(related:DeclineBenefit::class);
    }
    public function benefits()
    {
        return $this->hasMany(related:Benefit::class);
    }
    public function client_types()
    {
        return $this->hasMany(related:ClientType::class);
    }
}
