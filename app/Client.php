<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'lastname', 'curp', 'email', 'address', 'phone',
    ];

    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
