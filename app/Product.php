<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'description','category','avatar'
    ];
    /*
    @ Join with Category Table
    */

    public function categoryRecord()
{
    return $this->belongsTo(Category::class, 'category', 'id');
}

}
