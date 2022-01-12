<?php

namespace App\Http\Controllers;

// use App\Models\Masteruser;

use App\Models\Masteruser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;


class MasteruserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $ListUser = User::all();
        // dd($ListUser);
        return view('layouts.masteruser', compact('ListUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('component.masteruser.pageuseradd');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->file('image'));

        $data = $request->all();

        // dd($data);
        //
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $PostTrue               =       User::create([

                'name' => $request->name,
                'email' => $request->email,
                'role' => 0,
                'password' => Hash::make($request->password),

            ]);
            ($PostTrue == true) ? $result = back()->with('success', 'User created successfully!') : $result =   back()->with('error', 'Error User!');
            return $result;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masteruser  $masteruser
     * @return \Illuminate\Http\Response
     */
    public function show(Masteruser $masteruser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masteruser  $masteruser
     * @return \Illuminate\Http\Response
     */
    public function edit(Masteruser $masteruser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masteruser  $masteruser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masteruser $masteruser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masteruser  $masteruser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Masteruser $id)
    {
        //
        // dd($request->deleteid);
        $Deleteitem         =     User::find($request->deleteid)->forceDelete();
        // $Deleteitem         =     Transaction::find($id)->forceDelete();
        ($Deleteitem == true) ? $result = back()->with('success', 'User delete successfully!') : $result =   back()->with('error', 'Delete User !');

        return $result;
    }
}
