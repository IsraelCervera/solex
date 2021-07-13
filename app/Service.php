<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'description_long', 'name', 'description', 'stock', 'image', 'sell_price', 'status', 'category_id', 'provider_id',
    ];

    public function Category(){
    	return $this->belongsTo(Category::class);
    }

    public function Provider(){
    	return $this->belongsTo(Provider::class);
    }

    public function comments(){
    	return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function service(){
    	return $this->belongsTo('App\Service', 'service_id');
    }
}
