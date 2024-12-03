<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use App\Models\Ukmuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $ukms = Ukmuser::where("user_id", $user->id)->where('status', 1)->get();

        $data = [
            'ukms' => $ukms
        ];
        return view('ukm.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ukm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->has('foto')) {
            $file=$request->file('foto');
            $direktori=public_path().'/storage/foto/';          
            $nama_file=str_replace(' ','-',$request->foto->getClientOriginalName());
            $file_format= $request->foto->getClientOriginalExtension();
            $uploadSuccess = $request->foto->move($direktori,$nama_file);
        }
        Ukm::create([
            'nama_ukm' => $request->nama_ukm,
            'tujuan_ukm' => $request->tujuan_ukm,
            'kegiatan_ukm' => $request->kegiatan_ukm,
            'file_name' => $nama_file,
            'file_path' => '/storage/foto/',
        ]);

        return redirect()->route('dashboard.index')->withMessage('Sukses Menambahkan UKM baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $users = Ukmuser::where('ukm_id', $id)->where('status', 1)->get();
        $usersWaiting = Ukmuser::where('ukm_id', $id)->where('status', 0)->get();
        $data = [
            'users' => $users,
            'usersWaiting' => $usersWaiting,
        ];
        return view('ukm.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $ukm = Ukm::where('id', $id)->first();
        $data = [
            'ukm' => $ukm,
        ];
        return view('ukm.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ukm = Ukm::where('id', $id)->first();
        $ukm->update([
            'nama_ukm' => $request->nama_ukm,
            'tujuan_ukm' => $request->tujuan_ukm,
            'kegiatan_ukm' => $request->kegiatan_ukm,
        ]);
        if($request->has('foto')){
            $file=$request->file('foto');
            $direktori=public_path().'/storage/foto/';          
            $nama_file=str_replace(' ','-',$request->foto->getClientOriginalName());
            $file_format= $request->foto->getClientOriginalExtension();
            $uploadSuccess = $request->foto->move($direktori,$nama_file);
            if(isset($ukm->file_name)){
                File::delete($direktori.$ukm->file_name); 
            }
            $ukm->update([
                'file_name' => $nama_file,
            ]); 
        } 
        return redirect()->route('dashboard.index')->withMessage("Berhasil melakukan edit data UKM");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $ukm = Ukm::where('id', $id)->first();
        $ukm->delete();
        return redirect()->back()->withMessage("Berhasil menghapus UKM");
    }
    public function kick($id){
        $ukmuser = Ukmuser::where('id', $id)->first();
        $ukmuser->delete();

        return redirect()->back()->withMessage('Sukses mengeluarkan member');
    }
    public function accept($id){
        $ukmuser = Ukmuser::where('id', $id)->first();
        $ukmuser->update([
            'status' => 1,
        ]);

        return redirect()->back()->withMessage('success memasukkan member baru');
    }
}
