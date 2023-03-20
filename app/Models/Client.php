<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    // protected $table = 'clients';
    // protected $fillable = [
    //     'last_name', 'first_name', 'middle_name', 'extension_name','street','municipality','province','region',
    //     'birth_place','sex', 'civil_status', 'contact_number', 'email_address', 'client_status', 'application_type', 'client_id'
    // ];

    

    public function barangays()
    {
        return $this->hasOne(Barangay::class,'id','barangay_id');

    }
    public function occupations()
    {
        return $this->hasOne(Occupation::class,'client_id','id');

    }
    public function family_compositions()
    {
        return $this->hasMany(related:FamilyComposition::class);

    }
    public function education()
    {
        return $this->hasMany(related:Education::class);

    }
    public function disability_causes()
    {
        return $this->hasMany(related:DisabilityCause::class);

    }
    public function disability_types()
    {
        return $this->hasMany(related:DisabilityType::class);

    }
   
    public function seminar_trainings()
    {
        return $this->hasMany(related:SeminarTraining::class);

    }
    public function community_involvements()
    {
        return $this->hasMany(related:CommunityInvolvement::class);

    }
    public function organizations()
    {
        return $this->hasOne(related:Organization::class);

    }
    
    public function physicians()
    {
        return $this->hasOne(related:Physician::class);

    }

    public function identification_cards()
    {
        return $this->hasOne(related:IdentificationCard::class);

    }

    protected $fillable = ['name'];
   
    public function client_applications()
    {
        return $this->hasMany(related:ClientApplication::class);

    }

    public function client_application_requirements()
    {
        return $this->hasManyThrough(related:ClientApplicationRequirement::class, through:ClientApplication::class);
    }

    public function client_schedules()
    {
        return $this->hasManyThrough(related:ClientSchedule::class, through:ClientApplication::class);
    }

    public function declined_clients()
    {
        return $this->hasOneThrough(related:DeclinedClient::class, through:ClientApplication::class);
    }

    public function client_cards()
    {
        return $this->hasMany(related:ClientCard::class);

    }
    public function benefit_applications()
    {
        return $this->hasManyThrough(related:BenefitApplication::class, through:ClientCard::class);
    }

    public function benefit_application_requirements()
    {
        return $this->hasManyThrough(related:BenefitApplicationRequirement::class, through:BenefitApplication::class);
    }
   
    



   
}
