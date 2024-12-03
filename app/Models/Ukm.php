<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'nama_ukm', 'tujuan_ukm', 'kegiatan_ukm', 'file_name', 'file_path',
    ];

    public function users()
{
    return $this->belongsToMany(User::class, 'ukmusers', 'ukm_id', 'user_id');
}

    public function cek_daftar($user_id){
        $Ukmuser = Ukmuser::where('user_id', $user_id)->where('ukm_id', $this->id)->first();

        return $Ukmuser;
    }
}
