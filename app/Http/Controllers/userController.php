<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{

    public function signup(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|max:12',
            'address' => 'required',
            'contact_no' => 'required|numeric|digits:10',
            'dob' => 'required|date',
        ]);

        $User = new User();
        $User -> name = $request -> name;
        $User -> email  = $request -> email;
        $User -> password =Hash::make($request -> password);
        $User -> address = $request -> address;
        $User -> contact_no = $request -> contact_no;
        $User -> type =  0;
        $User -> dob = $request -> dob;
        $User -> save();
        return view('users.signIn')->with('success', 'Successfully Registered');

    }

    public function signin(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = User::where('users.email',$request->email)->first();

            if($user->type==0)
                return view('users.uesr_first')->with('success', 'Successfully loggedin');

            else{
                return view('pharmacy.pharamDash')->with('success', 'Successfully loggedin');
            }
        }

        else{
            return back()->with('error', 'Something wrong');
        }

    }


    public function logout(){
        Session::flush();
        Auth::logout();
        return view('users.signIn');
    }

}
