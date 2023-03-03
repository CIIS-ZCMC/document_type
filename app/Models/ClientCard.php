<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCard extends Model
{
    use HasFactory;
    protected $table = 'client_cards';
   

    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
    public function benefit_applications()
    {
        return $this->hasMany(related:BenefitApplication::class);
    }
    public function decline_benefits()
    {
        return $this->hasMany(related:DeclineBenefit::class);
    }
}
