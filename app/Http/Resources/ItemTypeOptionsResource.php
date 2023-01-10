<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemTypeOptionsResource extends JsonResource
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
            'id' => $this->resource->id,
            'type_id'   => $this->resource->type_id,
            'item_id'   => $this->resource->item_id,
            'items' => $this->whenLoaded('items', function() {
                return ItemValueResource::make($this->resource->items);
            }),
        ];
    }
}
