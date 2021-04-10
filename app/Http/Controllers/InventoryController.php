<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class InventoryController extends BaseController
{
    public function inventoryByLocation($storagelocation_id)
    {
         $storagelocations = Inventory::where('storagelocation_id', $storagelocation_id)->get();
         return response()->json($storagelocations);
    }

     public function create(Request $request, $storagelocation_id)
     {
         $inventory = new Inventory;
         $inventory->inventoryCategoryCodeSetId = $request->inventoryCategoryCodeSetId;
         $inventory->inventoryCategoryCodeId = $request->inventoryCategoryCodeId;
         $inventory->name = $request->name;
         $inventory->storagelocation_id = $storagelocation_id;
         $inventory->description = $request->description;
         $inventory->save();
         return response()->json($inventory);
     }

     public function show($id)
     {
        $inventory = Inventory::find($id);
        return response()->json($inventory);
     }

     public function update(Request $request, $id)
     { 
        $inventory = Inventory::find($id);
        if($request->input('inventoryCategoryCodeSetId')) {
            $inventory->inventoryCategoryCodeSetId = $request->input('inventoryCategoryCodeSetId');
        }
        if($request->input('inventoryCategoryCodeId')) {
            $inventory->inventoryCategoryCodeId = $request->input('inventoryCategoryCodeId');
        }
        if($request->input('name')) {
            $inventory->name = $request->input('name');
        }
        if($request->input('storagelocation_id')) {
            $inventory->storagelocation_id = $request->input('storagelocation_id');
        }
        if($request->input('description')) {
            $inventory->description = $request->input('description');
        }
        $inventory->save();
        return response()->json($inventory);
     }

     public function destroy($id)
     {
        $inventory = Inventory::find($id);
        $inventory->delete();

         return response()->json('inventory removed successfully');
     }
}
?>