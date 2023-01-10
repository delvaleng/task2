<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',       
        'code',     
        'name',     
        'unit',     
        'iva',      
        'price',  
    ];

    public function items_details()
    {
        return $this->hasMany(ItemDetails::class, 'parent_item_id', 'id');
    }

}
