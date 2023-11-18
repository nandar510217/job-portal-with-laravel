<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(Request $request) {
        return view('auth.login');
    }

    public function loginform(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->role == 'employer') {
                return redirect()->route('payment');
            }
            elseif($user->role == 'employee'){
                return redirect()->route('welcome');
            }
            else {
                return redirect()->route('user_list');
            }
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
    public function register(Request $request) {
        return view('auth.register');
    }

    public function registerform (Request $request) {
       
        User::Create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'active' => 0,
        ]);
        return redirect()->route('login');
    }

    public function registerUpdate(Request $request, $id) {
        $request->validate([
            'image' => "required|image|mimes:png,jpg,jpeg",
        ]);
        $user = Auth::user();
        if($user->image) {
            Storage::delete('public/images/' . $user->image);
        }
        $image = $request->image;
        $imageName = uniqid(). '_' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);

        $user = User::findOrfail($id);

        $user->update([
            "image" => $imageName,
        ]);

        return redirect()->route("profile")->with("success","Photo has uploaded successfully");
    }

}
