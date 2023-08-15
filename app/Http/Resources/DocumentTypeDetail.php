<?php

namespace App\Http\Resources;

use App\Models\Detail;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentTypeDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'document_type_id' => $this->document_type_id,
    
        ];
    }
}
