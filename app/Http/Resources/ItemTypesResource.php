<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemTypesResource extends JsonResource
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
            'id'      => $this->resource->id,
            'name'    => $this->resource->name,
            'item_type_options' => $this->whenLoaded('item_type_options', function() {
                return ItemTypeOptionsResource::collection($this->resource->item_type_options);
            }),

        ];
    }
}
