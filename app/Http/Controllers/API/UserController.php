<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ukmuser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
 * Get all users
 *
 * @group User Management
 * @response 200 {
 *   "id": 1,
 *   "name": "John Doe",
 *   "email": "johndoe@example.com"
 * }
 */
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function register($id, Request $request)
    {
        // Example registration logic
        User::create($request->all());
        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function own_ukm($id){
        $User = User::where('id', $id)->first();
        $UkmUser = $User->Userukm;
        $ukm = [];
        foreach($UkmUser as $key => $value){
            $ukm[] = [
                'nama_ukm' => $value->Ukm->nama_ukm,
            ];
        }
        return response()->json($ukm);
    }
    public function add_ukm($id, Request $request){
        $User = Ukmuser::create($request->all());
        return response()->json(['message' => 'berhasil menambah Ukm user ini'], 200);
    }
    public function delete_ukm($id, Request $request){
        $User = Ukmuser::where('id', $id)->first();
        return response()->json(['message' => 'berhasil Menghapus Ukm user ini']);
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            //code...
            $User = User::where('id', $id)->first();
            $User->update($request->all());
            return response()->json(['message' => "Berhasil Mengedit User"], 200);
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
            $User = User::where('id', $id)->first();
            $User->delete();
            return response()->json(['message' => "Berhasil Menghapus User"], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => "Gagal Menghapus User"], 500);
        }
    }
}
