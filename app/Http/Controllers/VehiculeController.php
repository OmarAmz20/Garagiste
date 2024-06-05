<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehiculeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role == "client") {
            $client = Client::where('user_id', $user->id)->first();
            if (!$client) {
                return redirect()->route('some.route')->with('error', 'Client not found');
            }
            $vehicules = Vehicule::where("client_id", $client->id)->get();
            return view('vehicules.index', compact('vehicules'));
        } else if ($user->role == "Admin") {
            $vehicules = Vehicule::all();
            return view('vehicules.index', compact('vehicules'));
        }
    }
    public function addModal()
    {
        return view("modals.addVehicle");
    }
    public function addVehicle(Request $request)
    {
        try {
            $user = Auth::user();
            $client = Client::where("user_id", $user->id)->first();
            $request->merge([
                "client_id" => $client->id
            ]);

            if ($request->hasFile('photos')) {
                $file = $request->file('photos');
                $image = time() . '_' . $file->getClientOriginalName(); // Append a unique identifier
                $path = $file->storeAs('photos', $image, 'public'); // Store in 'storage/app/public/photos'
                $url = "/storage/" . $path; // URL to access the image

                $vehicle = $request->all();
                $vehicle['photos'] = $url; // Set the image URL in the request data
                Vehicule::create($vehicle); // Save the vehicle details with the image URL

                return redirect()->route('vehicules.index')->with('success', 'Vehicle added successfully');
            } else {
                return redirect()->back()->with('error', 'No file uploaded');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Internal Server Error');
        }
    }

    public function deleteModel(Request $request) {
        $id = $request->input("id");
        $vehicule = Vehicule::where("id",$id)->first();
        return view("modals.deleteVehicle",compact("vehicule"));
    }
    public function confirmDelete(Request $request) {
        $id = $request->input("id");
        $vehicule = Vehicule::where("id",$id)->first();
        $vehicule->delete();
        return "deleted";
    }
    public function updateModel(Request $request) {
        $id = $request->input("id");
        $vehicule = Vehicule::where("id",$id)->first();
        return view("modals.modifyVehicle",compact("vehicule"));
    }
    public function updateVehicle(Request $request)
    {
        try {
            $id = $request->input('id');
            $vehicule = Vehicule::findOrFail($id);

            $vehicule->marque = $request->input('marque');
            $vehicule->model = $request->input('model');
            $vehicule->typeCarburant = $request->input('typeCarburant');
            $vehicule->immatriculation = $request->input('immatriculation');

            if ($request->hasFile('photos')) {
                $file = $request->file('photos');
                $image = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('photos', $image, 'public');
                $vehicule->photos = "/storage/" . $path;
            }

            $vehicule->save();

            return redirect()->route('vehicules.index')->with('success', 'Vehicle updated successfully');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

}
