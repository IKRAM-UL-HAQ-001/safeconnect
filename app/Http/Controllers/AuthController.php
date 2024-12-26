<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ("auth.login");
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required',
        ]);

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $user = Auth::user();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role,
                    ],
                    'token' => $token,
                    'role_based_redirect' => $user->role === 'admin'
                        ? 'admin.dashboard'
                        : ($user->role === 'driver'
                            ? ''
                            : ''),
                ],
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function loginAdminAuth(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('name', 'password'))) {
            $user = Auth::user();
            if ($user->role === "admin") {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === "driver") {
                return redirect()->route('');
            } else{
                return redirect()->route('');
            }
        }
        return back()->withErrors([
            'user_name' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15',  
            'role' => 'required|string|in:driver,passenger',
            'gender' => 'required|string|in:male,female', 
            'password' => 'required|confirmed|min:6',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully.',
            'data' => $user,
        ], 201);
    }
}