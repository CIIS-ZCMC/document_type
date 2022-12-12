<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeclinedClientLog extends Model
{
    use HasFactory;
    protected $table = 'declined_client_logs';
  
    public function declined_clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
