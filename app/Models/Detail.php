<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'details';
    protected $fillable = [
        'name',
        'description',
        'document_type_detail_id',
    ];
    
    public function document_type_details()
    {
        return $this->belongsTo(related:DocumentTypeDetail::class);
    }
  
   

}
