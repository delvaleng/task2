<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemValueResource extends JsonResource
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
        ];
    }
}
