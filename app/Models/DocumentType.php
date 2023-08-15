<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \Znck\Eloquent\Traits\BelongsToThrough;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    protected $table = 'document_types';
    protected $fillable = [
        'name',
        'description',
    ];

    public function document_type_details()
    {
        return $this->hasMany(related:DocumentTypeDetail::class);
    }
    public function details()
    {
        return $this->hasManyThrough(related:Detail::class, through:DocumentTypeDetail::class);
    }
  
   
}
