<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientApplicationRequirement extends Model
{
    use HasFactory;
    // protected $table = 'client_application_requirements';
    public function client_applications()
    {
        return $this->belongsTo(related:ClientApplication::class);
    }
}
