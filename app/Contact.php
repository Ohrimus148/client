<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'address',
        'postcode' ,
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
