<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakanController extends Controller
{
    public function index(){
        return view('kehadiran.index');
    }

    public function getData($tanggal_awal, $tanggal_akhir){
        $total = 0;
        $karyawan = DB::table('karyawan')
            ->leftJoin('makan', 'makan.level', '=', 'karyawan.level')
            ->orderBy('id_karyawan', 'ASC')
            ->get();

        foreach ($karyawan as $items) {
            $absen = DB::table('absen')
                    ->where('name', $items->name)
                    ->where('first_check_in', '<', date("h:i:s", strtotime('12:00:00')))
                    ->where('date', '>=', $tanggal_awal)
                    ->where('date', '<=', $tanggal_akhir)
                    ->count();


            $row = array();
            $row['name'] = $items->name;
            $row['kehadiran'] = $absen;
            $row['uang_makan'] = 'Rp. ' . format_uang($absen * $items->nominal);

            $data[] = $row;
        }
        
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
