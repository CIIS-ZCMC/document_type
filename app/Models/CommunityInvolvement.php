<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityInvolvement extends Model
{
    use HasFactory;
    protected $table = 'community_involvements';
    public function clients()
    {
        return $this->belongsTo(related:Client::class);
    }
}
