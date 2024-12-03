<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ukm;
use Illuminate\Http\Request;

class UkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Ukm::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            Ukm::create($request->all());
            return response()->json(['message' => "Tambah Ukm Berhasil"], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => "Tambah Ukm Gagal"], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            //code...
            $Ukm = Ukm::where('id', $id)->first();
        $Ukm->update($request->all());
        return response()->json(['message' => "Berhasil Mengedit Ukm"], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            //code...
            $Ukm = Ukm::where('id', $id)->first();
        $Ukm->delete();
        return response()->json(['message' => "Berhasil Menghapus Ukm"], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => "gagal Menghapus Ukm"], 500);
        }
    }
}
