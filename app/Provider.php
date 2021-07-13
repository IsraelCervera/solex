<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'lastname', 'email', 'address', 'curp', 'phone',
    ];

    public function products(){
    	return $this->hasMany(Product::class);
    }

    public function services(){
    	return $this->hasMany(Service::class);
    }
}
