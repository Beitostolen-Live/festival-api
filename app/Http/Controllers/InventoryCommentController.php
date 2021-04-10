<?php

namespace App\Http\Controllers;

use App\Models\InventoryComment;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class InventoryCommentController extends BaseController
{
    public function commentsByInventory($inventory_id)
    {
        $comments = InventoryComment::where('inventory_id',$inventory_id)->get();
        return response()->json($comments);
    }

     public function create(Request $request, $inventory_id)
     {
         $comment = new InventoryComment;
         $comment->comment = $request->comment;
         $comment->user_id = $request->user_id;
         $comment->inventory_id = $inventory_id;
         $comment->save();
         return response()->json($comment);
     }

     public function update(Request $request, $id)
     { 
        $comment = InventoryComment::find($id);
        if($request->input('comment')) {
            $comment->comment = $request->input('comment');
        }
        $comment->save();
        return response()->json($comment);
     }

     public function destroy($id)
     {
        $comment = InventoryComment::find($id);
        $comment->delete();

         return response()->json('inventory comment removed successfully');
     }
}
?>