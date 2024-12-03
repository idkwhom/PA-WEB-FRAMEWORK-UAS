<?php

namespace App\Http\Controllers;

use App\Models\Ukmuser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $data = [
            'user' => $user,
        ];
        return view('daftar')->with($data);
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
        $user = Auth::user();
        $user->update($request->all());

        return redirect()->back()->withMessage('Berhasil update profil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function daftarUkm($id){
        if(!isset(Auth::user()->nama) || !isset(Auth::user()->fakultas) || !isset(Auth::user()->nim) || !isset(Auth::user()->prodi)){
            return redirect()->route('user.index')->withMessage('Silahkan lengkapi profil terlebih dahulu');
        }
        Ukmuser::create([
            'user_id' => Auth::user()->id,
            'ukm_id' => $id,
            'status' => 0,
        ]);

        return redirect()->back()->withMessage('Success mendaftar');
    }
}
