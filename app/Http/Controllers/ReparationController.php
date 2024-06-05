<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReparationController extends Controller
{
    //
    public function index () {
        $user = Auth::user();
        $client_id = null;
        if ($user->role == "client") {
            $client_id = $user->client->id;
            $vehicles = $user->client->vehicules->pluck('id')->toArray();
            $reparations = Reparation::whereIn("id_vehicule",$vehicles)->get();

        }else  $reparations = Reparation::all();
        return view("repairs.index",compact("reparations","user","client_id"));
    }
    public function addModal() {
        $vehicules = Vehicule::all();
        return view("modals.createRepair", compact('vehicules'));
    }
    public function createRepair(Request $request) {
        $michanic_id = Auth::user()->id ;
        $request->merge([
            "id_mecanicien" => $michanic_id
        ]);
        Reparation::create($request->all());
        return redirect()->route("repair.index");
    }

    public function modifyStatus(Request $request) {
        $id = $request->input("id");
        $statut = $request->input("statut");
        $repair = Reparation::where("id",$id);
        $repair->update(["statut" =>$statut]);
        return "updated" ;
    }
    public function modifyNotesMichanic(Request $request) {
        $id = $request->input("id");
        $nm = $request->input("notes_mecanicien");
        $repair = Reparation::where("id",$id);
        $repair->update(["notes_mecanicien" => $nm]);
        return "updated" ;
    }

    public function modifyNotesClient(Request $request) {
        $id = $request->input("id");
        $nm = $request->input("notes_client");
        $repair = Reparation::where("id",$id);
        $repair->update(["notes_client" => $nm]);
        return "updated" ;
    }

}
