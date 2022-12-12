<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarTraining extends Model
{
    use HasFactory;
    protected $table = 'seminar_trainings';
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
