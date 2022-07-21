<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function getAllData(){
        $karyawan = Karyawan::all();

        return response()->json([
            'success' => true,
            'data' => $karyawan
        ]);
    }
}
