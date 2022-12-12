<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeclinedClient extends Model
{
    use HasFactory;
    protected $table = 'declined_clients';
    public function clients_applications()
    {
        return $this->belongsTo(related:ClientApplication::class);
    }

    public function declined_client_logs()
    {
        return $this->hasMany(related:DeclinedClientLog::class);

    }
}
