<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',       
        'parent_item_id',     
        'detail_item_id',     
        'type_id',     
        'quantity',      
    ];

    public function item_types(){
        return $this->hasOne(ItemTypes::class, 'id', 'type_id');
    }

}
