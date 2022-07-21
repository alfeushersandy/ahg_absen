<?php

namespace App\Http\Controllers;

use App\Imports\AbsenImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Absen;

class AbsenController extends Controller
{
    public function index(){
        return view('absen.index');
    }

    public function data(){
        $absen = Absen::all();

        return DataTables()
            ->of($absen)
            ->addIndexColumn()
            ->addColumn('check_in', function($absen){
                if(strtotime($absen->first_check_in) > strtotime('8:10:00')){
                    return "<div style='background-color:red;'><p style='color:white;'>". $absen->first_check_in . "</p></div>";
                }else{
                    return "<p style='color:green;'>". $absen->first_check_in . "</p>";
                }
            })
            ->rawColumns(['check_in'])
            ->make(true);   
    }

    public function import(Request $request){
        //validasi file excel
        $this->validate($request,[
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_absen',$nama_file);
 
		// import data
		Excel::import(new AbsenImport, public_path('/file_absen/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Absen Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/absen');
    }
}
