<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentTypeDetail extends Model
{
    use HasFactory;
    protected $table = 'document_type_details';
    protected $fillable = [
      
        'document_type_id',
    ];




    public function document_types()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    
}
    
    



