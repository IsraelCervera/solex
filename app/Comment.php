<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'video_id','body', 'created_at', 'updated_at',
    ];

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function product(){
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
