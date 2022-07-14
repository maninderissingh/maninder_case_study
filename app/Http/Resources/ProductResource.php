<?php
namespace App\Http\Resources;
   use Illuminate\Http\Resources\Json\ResourceCollection;

 
class ProductResource extends ResourceCollection
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
            //'id' => $this->id,
            'name' => $this->name,
            'cateogry' => $this->cateogry,
            'description' => $this->description,
            'price' => $this->price,
        ];

        //return parent::toArray($request);

        // return [
        //     'data' => $this->collection,
        //     'links' => [
        //         'self' => 'link-value',
        //     ],
        // ];
    }
}