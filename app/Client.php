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
        return $this->hasMany(Contact::class, 'client_id', 'id');
    }

    public function getValidatedData($data)
    {
        $rules = array(
            'first_name'  => 'required',
            'email' => 'required|email',
        );
        $collection = collect($data);
        // Filter of validation
        $valid_data = $collection->reject(function ($value, $key) {
            if($value['first_name'] == '') return $value;
            else if (!filter_var($value['email'], FILTER_VALIDATE_EMAIL)) return $value;
        });
        return $valid_data->all();
    }

    public function getInvalidatedData($data, $valid_data)
    {
        $collection = collect($data);
        return $collection->diffKeys($valid_data);
    }
}



