<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSchedule extends Model
{
    use HasFactory;
    protected $table = 'client_schedules';
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
