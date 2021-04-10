<?php

namespace App\Http\Controllers;

use App\Models\InventoryCount;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class InventoryCountController extends BaseController
{
    public function countsByInventory($inventory_id)
    {
         $counts = InventoryCount::where('inventory_id',$inventory_id)->get();
         return response()->json($counts);
    }

     public function create(Request $request, $inventory_id)
     {
         $count = new InventoryCount;
         $count->inventory_id = $inventory_id;
         $count->counted_at = $request->counted_at;
         $count->count = $request->count;
         $count->user_id = $request->user_id;
         $count->save();
         return response()->json($count);
     }

     public function destroy($id)
     {
        $count = InventoryCount::find($id);
        $count->delete();

         return response()->json('inventory count removed successfully');
     }
}
?>