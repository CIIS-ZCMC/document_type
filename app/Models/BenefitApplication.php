<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitApplication extends Model
{
    use HasFactory;
    protected $table = 'benefit_applications';
    public function client_cards()
    {
        return $this->belongsTo(related:ClientCard::class);
    }
 
    public function decline_benefits()
    {
        return $this->hasMany(related:DeclineBenefit::class);
    }

    public function benefit_schedules()
    {
        return $this->hasOne(related:BenefitSchedule::class);

    }
    public function benefit_application_requirements()
    {
        return $this->hasMany(related:BenefitApplicationRequirement::class);

    }
    public function benefit_application_logs()
    {
        return $this->hasMany(related:BenefitApplicationLog::class);
    }

}
