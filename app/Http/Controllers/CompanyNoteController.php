<?php

namespace App\Http\Controllers;

use App\Models\CompanyNote;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyNoteController extends BaseController
{
    public function notesByCompany($orgno)
    {
        $notes = CompanyNote::where('company_orgno', $orgno)->get();
        return response()->json($notes);
    }

    public function notesByCrew($crew_id)
    {
        $notes = CompanyNote::where('companycrew_id', $crew_id)->get();
        return response()->json($notes);
    }

     public function create($orgno, $crew_id, Request $request)
     {
         $note = new CompanyNote;
         $note->companycrew_id = $crew_id;
         $note->company_orgno= $orgno;
         $note->noteCodeSetId = $request->noteCodeSetId;
         $note->noteCodeId = $request->noteCodeId;
         $note->note = $request->note;
         $note->save();
         return response()->json($note);
     }

     public function show($id)
     {
        $note = CompanyNote::find($id);
        return response()->json($note);
     }

     public function update(Request $request, $id)
     { 
        $note = CompanyNote::find($id);
        if($request->input('noteCodeSetId')) {
            $note->noteCodeSetId = $request->input('noteCodeSetId');
        }
        if($request->input('noteCodeId')) {
            $note->noteCodeId = $request->input('noteCodeId');
        }
        if($request->input('note')) {
            $note->note = $request->input('note');
        }
        $note->save();
        return response()->json($note);
     }

     public function destroy($id)
     {
        $note = CompanyNote::find($id);
        $note->delete();

         return response()->json('note removed successfully');
     }
}
?>