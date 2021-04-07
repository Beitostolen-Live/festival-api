<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class FestivalController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
     
     $festivals = Festival::all();

     return response()->json($festivals);

    }

     public function create(Request $request)
     {
        $festival = new Festival;

       $festival->name= $request->name;
       $festival->year = $request->year;
       $festival->start_at = $request->start_at;
       $festival->end_at = $request->end_at;
       
       $festival->save();

       return response()->json($festival);
     }

     public function show($id)
     {
        $festival = Festival::find($id);

        return response()->json($festival);
     }

     public function update(Request $request, $id)
     { 
        $festival = Festival::find($id);
        
        $festival->name = $request->input('name');
        $festival->year = $request->input('year');
        $festival->start_at = $request->input('start_at');
        $festival->end_at = $request->input('end_at');
        $festival->save();
        return response()->json($festival);
     }

     public function destroy($id)
     {
        $festival = Festival::find($id);
        $festival->delete();

         return response()->json('festival removed successfully');
     }
}
?>