<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otcabsen extends Model
{
    use HasFactory;
    protected $table = 'absen_otc';
    protected $primaryKey = 'id_absen';
    protected $guarded = [];
}