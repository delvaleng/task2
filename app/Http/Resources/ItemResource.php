<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'id'   => $this->resource->id,
            'code' => $this->resource->code,
            'name' => $this->resource->name,
            'unit' => $this->resource->unit,
            'iva'  => $this->resource->iva,
            'price'=> $this->resource->price,   
            'items_details' => $this->whenLoaded('items_details', function() {
                return ItemDetailsResource::collection($this->resource->items_details);
            }),
        ];
    }
}
