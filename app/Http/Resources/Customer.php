<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Customer extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'customerId' => $this->customerId,
            'name' => $this->name,
            'cnp' => $this->cnp
        ];
    }
}
