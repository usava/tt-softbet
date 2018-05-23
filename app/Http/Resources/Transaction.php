<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Transaction extends Resource
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
            'transactionId' => $this->transactionId,
            'amount' => $this->amount,
            'date' => $this->date
        ];
    }
}
