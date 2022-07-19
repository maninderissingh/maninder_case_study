<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'cart';
    protected $fillable = [
        'session_id', 'user_id','product_id','qty'
    ];


    public function productRecord()
{
    return $this->belongsTo(Product::class, 'product_id', 'id');
}
}
