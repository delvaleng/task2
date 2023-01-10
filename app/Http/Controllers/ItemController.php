<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemDetails;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    
    public  function index(Request $request)
    {
        $items = null;
        if(isset($request->code)){
            $items = Item::where('code', 'like',  '%'.$request->code.'%')->get();
        }else{
            $items = Item::get();
        }

       return ItemResource::collection($items);
    }

    public  function search(Request $request)
    {   
        $data = null;


        if(isset($request->code)){
            $data = Item::where('code', $request->code)
            ->with(['items_details.item_types.item_type_options.items'])
            ->get();
        }
        return ItemResource::collection($data);
    }
}
