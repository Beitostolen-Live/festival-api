<?php

namespace App\Http\Controllers;

use App\Models\StorageLocation;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StorageLocationController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
         $storagelocations = StorageLocation::all();
         return response()->json($storagelocations);
    }

     public function create(Request $request)
     {
         $location = new StorageLocation;
         $location->name = $request->name;
         $location->description = $request->description;
         $location->long = $request->long;
         $location->lat = $request->lat;
         $location->save();
         return response()->json($location);
     }

     public function show($id)
     {
        $location = StorageLocation::find($id);
        return response()->json($location);
     }

     public function update(Request $request, $id)
     { 
        $location = StorageLocation::find($id);
        if($request->input('name')) {
            $location->name = $request->input('name');
        }
        if($request->input('description')) {
            $location->description = $request->input('description');
        }
        if($request->input('long')) {
            $location->long = $request->input('long');
        }
        if($request->input('lat')) {
            $location->lat = $request->input('lat');
        }
        $location->save();
        return response()->json($location);
     }

     public function destroy($id)
     {
        $location = StorageLocation::find($id);
        $location->delete();

         return response()->json('location removed successfully');
     }
}
?>