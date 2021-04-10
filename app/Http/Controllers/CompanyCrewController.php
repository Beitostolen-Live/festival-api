<?php

namespace App\Http\Controllers;

use App\Models\CompanyCrew;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyCrewController extends BaseController
{
    public function index($orgno)
    {
        $crew = CompanyCrew::where('orgno', $orgno)->get();
        return response()->json($crew);
    }

     public function create($orgno, Request $request)
     {
         $crew = new CompanyCrew;
         $crew->orgno = $orgno;
         $crew->name= $request->name;
         $crew->email = $request->email;
         $crew->phone = $request->phone;
         $crew->comment = $request->comment;
         $crew->save();
         return response()->json($crew);
     }

     public function show($id)
     {
        $crew = CompanyCrew::find($id);
        return response()->json($crew);
     }

     public function update(Request $request, $id)
     { 
        $crew = CompanyCrew::find($id);
        if($request->input('name')) {
            $crew->name = $request->input('name');
        }
        if($request->input('email')) {
            $crew->email = $request->input('email');
        }
        if($request->input('phone')) {
            $crew->phone = $request->input('phone');
        }
        if($request->input('comment')) {
            $crew->comment = $request->input('comment');
        }
        $crew->save();
        return response()->json($crew);
     }

     public function destroy($id)
     {
        $crew = CompanyCrew::find($id);
        $crew->delete();

         return response()->json('crew removed successfully');
     }
}
?>