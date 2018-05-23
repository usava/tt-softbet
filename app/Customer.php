<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cnp'
    ];

    //Get all customer transactions
    public function transactions()
    {
        return $this->hasMany('App\Transaction', 'customerId');
    }
}
