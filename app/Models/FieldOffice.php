<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOffice extends Model
{
    use HasFactory;

   
    protected $table = 'field_offices';
    protected $fillable = [
        'name', 'address', 'status', 'created_by',
    ];

     public function barangays()
    {
        return $this->hasMany(Barangay::class,'field_office_id');
    }

    
}
