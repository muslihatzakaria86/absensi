<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;

class AbsenController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function absensi(Request $request){
        $this->validate($request, [
            'status'=>'required',
            'keterangan'=>'required',
        ]);

        $absen=new \App\Models\Absensi;
        $absen->name= auth()->user()->name;
        $absen->status= $request->status;
        $absen->keterangan= $request->keterangan;
        $absen->save();

        return back();
    }

    public function laporan()
    {
        return view('home.laporan', [
            'absensi' => Absensi::all()
        ]);
    }

    public function data()
    {
        return view('home.data', [
            'karyawan' => User::where('role', 'karyawan')->get()
        ]);
    }
}
