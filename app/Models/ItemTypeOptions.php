<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTypeOptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',       
        'type_id', 
        'item_id', 
    ];
    
    public function items(){
        return $this->hasOne(Item::class, 'id', 'item_id');
    }

}
