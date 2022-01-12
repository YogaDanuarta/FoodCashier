<?php

namespace App\Http\Controllers;

use App\Models\Masterstock;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class MasterstockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ListItem = Masterstock::all();

        // dd($ListItem);

        return view('layouts.masterstock', compact('ListItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $dataValidator = $request->all();


        $validator      =       Validator::make($dataValidator, [
            'nameitem' => 'required|min:5|max:10',
            'descriptionitem' => 'required',
            'price' => 'required',
            'qty' => 'required',

        ]);




        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $path =   $file->move('assets/img/', $filename);
            $data = [
                'nameitem' => $request->nameitem,
                'descriptionitem' => $request->descriptionitem,
                'image' => $filename,
                'path' =>  $path,
                'price' => $request->price,
                'qty' => $request->qty,

            ];


            $PostTrue               =       Masterstock::create($data);
            ($PostTrue == true) ? $result = back()->with('success', 'Item created successfully!') : $result =   back()->with('error', 'Error Item!');
            return $result;
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masterstock  $masterstock
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masterstock  $masterstock
     * @return \Illuminate\Http\Response
     */
    public function edit(Masterstock $masterstock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masterstock  $masterstock
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {




        if ($request->file('image_e')) {

            // dd($request->file('image_e'));
            $file = $request->file('image_e');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $path =   $file->move('assets/img/', $filename);
            $UpdateStock         =       array(
                "nameitem"              =>      $request->nameitem_e,
                "descriptionitem"       =>      $request->descriptionitem_e,
                "price"                 =>      $request->price_e,
                "qty"                   =>      $request->qty_e,
                "image"                 =>      $filename,
                "path"                 =>       $path,
            );
        } else {
            // dd(false);
            $UpdateStock         =       array(
                "nameitem"              =>      $request->nameitem_e,
                "descriptionitem"       =>      $request->descriptionitem_e,
                "price"                 =>      $request->price_e,
                "qty"                   =>      $request->qty_e,

            );
        }




        $UpdateDataBarang       = Masterstock::find($id)->update($UpdateStock);
        ($UpdateDataBarang == true) ? $result = back()->with('success', 'Item Updated successfully!') : $result =   back()->with('error', 'Error Item!');
        return $result;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masterstock  $masterstock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //
        $Deleteitem         =     Masterstock::find($id)->forceDelete();
        ($Deleteitem == true) ? $result = back()->with('success', 'Item delete successfully!') : $result =   back()->with('error', 'Delete Item !');

        return $result;
    }
}
