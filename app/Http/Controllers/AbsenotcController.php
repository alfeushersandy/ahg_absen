<?php

namespace App\Http\Controllers;

use App\Imports\AbsenotcImport;
use App\Models\Otcabsen;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AbsenotcController extends Controller
{
    public function index(){
        return view('absen_otc.index');
    }

    public function data(){
        $absen = Otcabsen::all();

        return DataTables()
            ->of($absen)
            ->addIndexColumn()
            ->addColumn('check_in', function($absen){
                if(strtotime($absen->time_in) > strtotime('8:10:00')){
                    return "<div style='background-color:red;'><p style='color:white;'>". $absen->time_in. "</p></div>";
                }else{
                    return "<p style='color:green;'>". $absen->time_in . "</p>";
                }
            })
            ->rawColumns(['check_in'])
            ->make(true);   
    }

    public function import(Request $request){
        $this->validate($request,[
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = $file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_absen_otc',$nama_file);
 
		// import data
		Excel::import(new AbsenotcImport, public_path('/file_absen_otc/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Absen Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/otc/absen');
    }
}
