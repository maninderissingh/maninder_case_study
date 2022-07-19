<?php
namespace App\Http\Resources;
   use Illuminate\Http\Resources\Json\Resource;
   use App\Http\Resources\CategoryResource;

class ProductResource extends Resource
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
            'cateogry' => new CategoryResource($this->categoryRecord),
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