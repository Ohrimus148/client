<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'first_name',
        'email' ,
        ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
