<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name', 'description', 'description_long',  'logo', 'mail', 'address', 'phone', 'contact_text', 'hours_of_operation', 'google_maps_link',
    ];
}
