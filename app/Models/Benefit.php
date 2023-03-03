<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;
protected $guarded =[];
protected $fillable=['benefit_name'];
    public function client_types()
    {
        return $this->belongsToMany(ClientType::class, 'client_benefits');
    }
    public function requirements()
    {
        return $this->belongsToMany(Requirement::class, 'benefit_requirements');
    }

}
