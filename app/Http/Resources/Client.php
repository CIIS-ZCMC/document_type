<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Client extends JsonResource
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
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'name_ext' => $this->name_ext,
            'gender' => $this->gender,
            'contact_no' => $this->contact_no,
            'job_title' => $this->job_title,
            'employee_no' => $this->employee_no,
            'is_active' => $this->is_active !=null ? $this->is_active : null,
            'image' => $this->image,
            'full_name' => $this->first_name.' '.($this->middle_name != null ? substr($this->middle_name, 0, 1).'. ' : '').$this->last_name,

            'applications' => $this->client_applications ? ClientApplication::collection($this->client_applications) : [],
        ];
    }
}
