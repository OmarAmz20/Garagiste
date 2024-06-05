<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function index() {
        $spareParts = SparePart::all();
        return view("stock.index",compact("spareParts"));
    }

    public function updateSparePart (Request $request ) {
        $id = $request->input("id");
        $sparePart = SparePart::where("id",$id);
        $sparePart->update($request->all());
        return redirect()->route("spareParts.index");
    }

    public function addModal (){
        return view("modals.addSparePart");
    }

    public function addRepare(Request $request) {
        SparePart::create($request->all());
        return redirect()->route("spareParts.index");

    }

    public function deleteModal(Request $request) {
        $id = $request->input("id");
        $sparePart = SparePart::findOrFail($id);
        return view('modals.deleteSparePart',compact('sparePart'));
    }
    public function updateModal(Request $request) {
        $id = $request->input("id");
        $sparePart = SparePart::findOrFail($id);
        return view('modals.modifySeparePart',compact('sparePart'));
    }

    public function deleteSparePart (Request  $request) {
        $id = $request->input("id");
        $sparePart = SparePart::findOrFail($id);
        $sparePart->delete();
        return "deleted";
    }
    public function modifySparePart(Request $request) {
        $id = $request->input("id");
        $sparePart = SparePart::findOrFail($id);
        $sparePart->update($request->all());
        return redirect()->route("back");
    }




}
