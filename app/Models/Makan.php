<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makan extends Model
{
    use HasFactory;
    protected $table = 'makan';
    protected $primaryKey = 'id_makan';
    protected $guarded = [];

    public function karyawan(){
        return $this->belongsTo(Karyawan::class, 'level', 'level');
    }
}
