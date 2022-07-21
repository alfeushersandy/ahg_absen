<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Otc;
use DataTables;

use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    public function data(){
        $karyawan = DB::table('karyawan')
                    ->leftjoin('makan', 'makan.level', '=', 'karyawan.level')
                    ->orderBy('id_karyawan')
                    ->get();

        return DataTables()
            ->of($karyawan)
            ->addIndexColumn()
            ->make(true);   
    }

    public function otc(){
        $karyawan = Otc::all();
        return view('otc.index', compact('karyawan'));
    }

    public function data2(){
        $karyawan = DB::table('master_otc')
                    ->orderBy('id')
                    ->get();

        return DataTables()
            ->of($karyawan)
            ->addIndexColumn()
            ->make(true);   
    }

}
