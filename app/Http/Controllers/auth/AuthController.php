<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        $content = $request->only("email", "password");
        if (Auth::attempt($content)) {
            $user = User::where("email",$request->input("email"))->first();
            if ($user) {
                session(['role' => $user->role]);
            }
            return redirect("dashboard")->withSuccess("You have Successfully loggedin");
        }
        return redirect("login");
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $request->merge([
            "role" => "client"
        ]);
        $data = $request->all();
        $check = $this->create($data);

        return redirect("login")->withSuccess('Great! You have Successfully loggedin');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password'])
        ]);
        Client::create(["user_id" => $user->id ]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return Redirect('login');
    }
}
