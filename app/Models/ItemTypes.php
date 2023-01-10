<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',       
        'name'  
    ];

    public function item_type_options()
    {
        return $this->hasMany(ItemTypeOptions::class, 'type_id', 'id');
    }


}
