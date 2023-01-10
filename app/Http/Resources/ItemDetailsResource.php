<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemDetailsResource extends JsonResource
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
            'parent_item_id'   => $this->resource->parent_item_id,
            'detail_item_id'   => $this->resource->detail_item_id,
            'type_id'          => $this->resource->type_id,
            'quantity'         => $this->resource->quantity,
            'item_types'       => $this->whenLoaded('item_types', function() {
                return ItemTypesResource::make($this->resource->item_types);
            }),
        ];
    }
}
