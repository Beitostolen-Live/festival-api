<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
         $companies = Company::all();
         return response()->json($companies);
    }

     public function create(Request $request)
     {
         $company = new Company;
         $company->orgno = $request->orgno;
         $company->companyCategoryCodeSetId= $request->companyCategoryCodeSetId;
         $company->companyCategoryCodeId = $request->companyCategoryCodeId;
         $company->name = $request->name;
         $company->orgformCodeSetId = $request->orgformCodeSetId;
         $company->orgformCodeId = $request->orgformCodeId;
         $company->postalAddress_id = $request->postalAddress_id;
         $company->businessAddress_id = $request->businessAddress_id;
         $company->save();
         return response()->json($company);
     }

     public function show($orgno)
     {
        $company = Company::find($orgno);
        return response()->json($company);
     }

     public function update(Request $request, $orgno)
     { 
        $company = Company::find($orgno);
        $company->companyCategoryCodeSetId = $request->input('companyCategoryCodeSetId');
        $company->companyCategoryCodeId = $request->input('companyCategoryCodeId');
        $company->name = $request->input('name');
        $company->orgformCodeSetId = $request->input('orgformCodeSetId');
        $company->orgformCodeId = $request->input('orgformCodeId');
        $company->postalAddress_id = $request->input('postalAddress_id');
        $company->businessAddress_id = $request->input('businessAddress_id');
        $company->save();
        return response()->json($company);
     }

     public function destroy($orgno)
     {
        $company = Company::find($orgno);
        $company->delete();

         return response()->json('company removed successfully');
     }
}
?>