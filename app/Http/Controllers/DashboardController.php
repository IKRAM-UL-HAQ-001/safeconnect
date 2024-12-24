<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('auth.login');
        }
        else{
            $user = Auth::user();
            if($user->role === "admin"){
                return view('admin.dashboard');
            }else if($user->role === "driver"){
                return view('admin.dashboard');
            }else{
                return view('admin.dashboard');
            }
        }
    }
    
}
