<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
          'name' => $this->name,
          'slug' => $this->slug,
          'price' => $this->regular_price,
          'SKU' => $this->SKU,
          'category_name' => $this->category->name
        ];
    }
}
