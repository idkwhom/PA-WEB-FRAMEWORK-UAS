<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('/register');
    }
    public function store(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
       
        try{
            $user = User::create([
                'nama' => "-",
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('user');
            event(new Registered($user));
            return redirect("/login")->withMessage('Berhasil Membuat akun baru', "Sukses membuat akun baru");
        } catch(\Throwable $th){
           return redirect()->back()->withMessage($th->getMessage());
        }
    }
}
