<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    
    public function userList(){
        if (!auth()->check()) {
            return redirect()->route('auth.login');
        }
        else{
            $userRecords = User::all();
            return view('admin.user.list',compact('userRecords'));
        }
    }

    public function destroy(Request $request){
        if (!auth()->check()) {
            return redirect()->route('auth.login');
        }
        else{
            $userId = $request->input('user_id');
            $user = User::findOrFail($userId);
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully!');
        }
    }

    public function edit(Request $request){
        if (!auth()->check()) {
            return redirect()->route('auth.login');
        }
        else{
            if (Auth::user()->role=="admin"){
                $id= $request->user_id;
                $userRecords=User::find($id);
                return view('admin.user.update',compact('userRecords'));
            }
            else{
                return redirect()->route('auth.login')->witherror("you are not allowd to update user");
            }
        }
    }
    public function update(Request $request){

        $request->validate([
            'password' => 'required|string|min:8',
        ]);
    
        if (!auth()->check()) {
            return redirect()->route('auth.login');
        }
        else{
            if (Auth::user()->role=="admin"){
                $user = user::find($request->user_id);
                $user->password =  Hash::make($request->password);
                $user->save();
                return redirect()->route('admin.dashBoard');
            }
            else{
                return redirect()->route('users.edit');
            }
        }
    }
}
