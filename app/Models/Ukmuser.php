<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukmuser extends Model
{
    //
    use HasFactory;
    protected $fillable = ['user_id', 'ukm_id', 'status'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Ukm(){
        return $this->belongsTo(Ukm::class);
    }
}
