<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientApplication extends Model
{
    use HasFactory;
    protected $table = 'client_applications';
  
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
    public function client_application_requirements()
    {
        return $this->hasMany(related:ClientApplicationRequirement::class);

    }
    public function client_schedules()
    {
        return $this->hasOne(related:ClientSchedule::class);

    }

    public function declined_clients()
    {
        return $this->hasOne(related:DeclinedClient::class);

    }
  
}
