<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Models\Vehicule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view("clients.index", compact("clients"));
    }

    public function deleteModal(Request $request)
    {
        $id = $request->input('id');
        $client = Client::where("id", $id)->first();
        return view("modals.delete", compact("client"));
    }

    public function delete(Request $request)
    {
        $id = $request->input("id");
        $client = Client::where("id", $id)->first();
        $vehicules = Vehicule::where("client_id", $id);
        $user = User::where("id", $client->user_id)->first();
        $vehicules->delete();
        $client->delete();
        $user->delete();
        return "ok";
    }
    public function addModal(Request $request)
    {
        return view("modals.addClient");
    }
    public function addClient(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:8',
                'email' => 'required|string|email|max:255|unique:users',
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'addresse' => 'required|string|max:255',
                'telephone' => 'required|string|max:255',
            ]);

            $request->merge([
                'role' => 'client',
                'password' => Hash::make($request->input('password')),
            ]);

            $user = $request->only(['username', 'email', 'role', 'password']);
            $newuser = User::create($user);

            $request->merge(['user_id' => $newuser->id]);

            $client = $request->only(['nom', 'prenom', 'addresse', 'telephone', 'user_id']);
            Client::create($client);

            return response()->json(['message' => 'Client and user created successfully'], 201);
        } catch (Exception  $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function updateModal(Request $request)
    {
        try {
            $id = $request->input("id");
            $client = Client::find($id);  // Retrieve the first client matching the id
            $user = User::find($client->user_id);  // Retrieve the first client matching the id
            if (!$client) {
                throw new \Exception("Client not found");
            }
            return view("modals.modifyModal", compact("client", "user"));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
    public function updateClient(Request $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $id = $request->input("id");

        // Find the client or throw a 404 error
        $client = Client::findOrFail($id);

        $client->prenom = $request->input('prenom');
        $client->nom = $request->input('nom');
        $client->addresse = $request->input('addresse');
        $client->telephone = $request->input('telephone');
        $client->save();

        // Find the user or throw a 404 error
        $id = $request->input("user_id");
        $user = User::findOrFail($id);

        $user->username = $request->input('username');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function profile () {
        $user = Auth::user();
        return view("clients.profile",compact("user"));
    }
}
