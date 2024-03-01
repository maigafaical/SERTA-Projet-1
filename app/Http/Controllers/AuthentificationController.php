<?php

namespace App\Http\Controllers;


use App\Models\Transactions;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{
    public function accueil()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }
        return view('welcome')->with('status', 'identifiant ou mot de passe incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }

    public function dashboard()
    {
        
        $transactions = Transactions::all();
        return view ('dashboard', compact('transactions'));
    }
}
