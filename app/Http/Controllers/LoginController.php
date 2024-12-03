<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('login');
    }

    public function auth(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:6',
        ],[
            'email.required'=>'email tidak boleh kosong',
            'password.required'=>'password tidak boleh kosong',
            'password.min'=>'password minimal 6 angka',
        ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/dashboard');
        }else{
            return redirect()->back()->withInput($request->all())->withErrors('email dan password salah');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
