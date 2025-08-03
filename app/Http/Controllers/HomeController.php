<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->usertype; // atau role

            if ($role === "user") {
                return view("welcome");
            } elseif ($role === "admin") {
                return view("admin.dashboard");
            } else {
                abort(403, 'Role tidak dikenali.');
            }
        }

        return redirect()->route('login');
    }
}
