<?php

namespace App\Http\Controllers;

use App\Models\Banding;
use Illuminate\Http\Request;

class BandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('uji_banding', [
            'title' => 'Uji Banding Akun',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uji_banding_create', [
            'title' => 'Uji Banding Akun',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'alasan_banding' => 'required',
            ]);
            $validatedData['user_id'] = auth()->user()->id;
            if ($request->hasFile('image')) {
                $validatedData['image'] = $request->file('image')->store('banding');
            }
            Banding::create($validatedData);
            return redirect('/uji-banding')->with('message', 'Sukses Ajukan banding, tunggu info selenjutnya');
        } catch (\Throwable $th) {
            return back()->with('message', 'Isi form dengan lengkap');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
