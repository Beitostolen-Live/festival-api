<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class PersonController extends BaseController
{
    public function index($supplier_id)
    {
        $persons = Person::where('supplier_id', $supplier_id)->get();
        return response()->json($persons);
    }

     public function create($supplier_id, Request $request)
     {
        $person = new Person;

        $person->name= $request->name;
        $person->phone = $request->phone;
        $person->email = $request->email;
        $person->comment = $request->comment;
        $person->supplier_id = $supplier_id;

        $person->save();

        return response()->json($person);
     }
}
?>