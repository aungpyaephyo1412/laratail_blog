<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view('user.dashboard',compact('user'));
    }

    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            "name" => "required |min:4",
//            "email" => "required|email|unique:users,email",
////            "password" => "required|min:8",
////            "confirm_password" => "same:password",
//            'phone' => 'required|unique:users,phone',
//            'role' => 'required',
//            'privacy' => 'required',
//            'promo' => 'required'
//        ]);
        if ($request->hasFile('photo')) {
            $fileName = uniqid() . uniqid() . 'user' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/user', $fileName);
        }else{
            return redirect()->back();
        }
        $user = new User();
        $user->name = $request->first_name . $request->last_name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->privacy = $request->privacy;
        $user->promo = $request->promo;
        $user->image = 'user/'.$fileName;
        $user->remember_token = uniqid() . $request->first_name . $request->last_name;
        $user->save();
        return redirect()->route('user.dashboard');
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
