<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class SupplierController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
     
     $suppliers = Supplier::all();

     return response()->json($suppliers);
    }

     public function create(Request $request)
     {
        $supplier = new Supplier;

       $supplier->name= $request->name;
       $supplier->address = $request->address;
       $supplier->postalcode = $request->postalcode;
       $supplier->postal = $request->postal;
       $supplier->comment = $request->comment;
       
       $supplier->save();

       return response()->json($supplier);
     }

     public function show($id)
     {
        $supplier = Supplier::find($id);

        return response()->json($supplier);
     }

     public function update(Request $request, $id)
     { 
        $supplier = Supplier::find($id);
        
        $supplier->name = $request->input('name');
        $supplier->address = $request->input('address');
        $supplier->postalcode = $request->input('postalcode');
        $supplier->postal = $request->input('postal');
        $supplier->postal = $request->input('postal');
        $supplier->save();
        return response()->json($supplier);
     }

     public function destroy($id)
     {
        $supplier = Supplier::find($id);
        $supplier->delete();

         return response()->json('supplier removed successfully');
     }
}
?>