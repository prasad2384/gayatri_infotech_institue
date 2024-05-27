<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Http\Request;

class registercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name'=>'required',
                'mobileno'=>'required|numeric|regex:"^[6-9]\d{9}$"',
                'email'=>'required|Email|regex:/^([a-z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/',
                'password'=>'required|regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{5,}$"'
            ],
            [
                'name.required'=>'Please Enter Category Name',
                'mobileno.regex'=>'Please Enter Valid Mobileno',
                'email.regex'=>'Enter Email Address is Not Valid',
                'password.regex'=>'Minimum five characters, at least one uppercase letter, one lowercase letter, one number and one special character:'
            ],
            // [
            // ],
         

        );
        $name=$request->get('name');
        $email=$request->get('email');
        $mobileno=$request->get('mobileno');
        $password=$request->get('password');
        $data=new register([
            'name'=>$name,
            'email'=>$email,
            'mobileno'=>$mobileno,
            'password'=>$password,
        ]);
        // echo"<pre>";
        // print_r($data);
        // exit();
        $data->save();

        return redirect('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
