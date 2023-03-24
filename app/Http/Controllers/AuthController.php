<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembimbing;
use App\Models\User;


class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
       $credentials = $request->validate([
         'email' => 'required|email',
         'password' => 'required'
       ]);

       if(auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    return back();
}

    public function register(){
        return view('auth.register');
    }

    public function postregister(Request $request){

    $this->validate($request, [
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required'
    ]);

    $user=new \App\Models\User;
    $user->role='karyawan';
    $user->name= $request->name;
    $user->email= $request->email;
    $user->alamat= $request->alamat;
    $user->password= bcrypt($request->password);
    $user->save();
    return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function profile(){
        return view('home.profilekaryawan');
    }

    public function edit(){
        return view('home.edit-profile');
    }

    public function update(Request $request, $name){
        User::where('name', $name)->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect('/profile');
    }

    public function destory($id)
    {
        return $id;
        users::destory($id);

        return redirect('users')->with('delete-users', 'Data berhasil dihapus!');
    }
}

