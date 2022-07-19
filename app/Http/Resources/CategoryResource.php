<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CategoryResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //die("SDFS");
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'avatar' => $this->avatar,
            'description' => $this->description,
        ];
    }
}
