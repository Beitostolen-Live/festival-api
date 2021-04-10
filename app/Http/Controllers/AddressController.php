<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AddressController extends BaseController
{
     public function create(Request $request)
     {
        $this->validate($request, [
            'countryCodeSetId' => 'required',
            'countryCodeId' => 'required|string',
            'postalCodeSetId' => 'required',
            'postalCodeId' => 'required|string',
            'address1' => 'required|string',
            'muncipalityCodeSetId' => 'required|string',
            'muncipalityCodeId' => 'required|string',
        ]);

        $address = new Address;

        $address->countryCodeSetId= $request->countryCodeSetId;
        $address->countryCodeId = $request->countryCodeId;
        $address->postalCodeSetId = $request->postalCodeSetId;
        $address->postalCodeId = $request->postalCodeId;
        $address->address1 = $request->address1;
        $address->address2 = $request->address2;
        $address->muncipalityCodeSetId = $request->muncipalityCodeSetId;
        $address->muncipalityCodeId = $request->muncipalityCodeId;
       
        $address->save();

        return response()->json($address);
     }

     public function show($id)
     {
        $address = Address::find($id);

        return response()->json($address);
     }

     public function update(Request $request, $id)
     { 
        $address = Address::find($id);
        
        $address->countryCodeSetId = $request->input('countryCodeSetId');
        $address->countryCodeId = $request->input('countryCodeId');
        $address->postalCodeSetId = $request->input('postalCodeSetId');
        $address->postalCodeId = $request->input('postalCodeId');
        $address->address1 = $request->input('address1');
        $address->address2 = $request->input('address2');
        $address->muncipalityCodeSetId = $request->input('muncipalityCodeSetId');
        $address->muncipalityCodeId = $request->input('muncipalityCodeId');
        $address->save();
        return response()->json($address);
     }

     public function destroy($id)
     {
        $address = Address::find($id);
        $address->delete();

         return response()->json('address removed successfully');
     }
}
?>