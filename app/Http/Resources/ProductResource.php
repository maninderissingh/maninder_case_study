<?php
 
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
 
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cateogry' => $this->cateogry,
            'description' => $this->description,
            'price' => $this->price,
        ];
    }
}