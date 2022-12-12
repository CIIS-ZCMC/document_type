<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;
    //     public function field_offices()
    // {
    //     return $this->hasOne(FieldOffice::class);
    // }
    protected $table = 'barangays';
    protected $fillable = [
        'name', 'created_by', 'field_office_id',
    ];

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
    
  
}
