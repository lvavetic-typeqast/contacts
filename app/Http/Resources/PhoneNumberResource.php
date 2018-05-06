<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\ContactResource;

class PhoneNumberResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {               
        return [
            'id' => $this->id,
            'contact_id' => $this->contact_id,
            'number' => $this->number,
            'label' => $this->label,
        ];
    }
}
