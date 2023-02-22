<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Banding;
use Illuminate\Http\Request;

class BandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('uji_banding', [
            'title' => 'Uji Banding Akun',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('uji_banding_create', [
            'title' => 'Uji Banding Akun',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
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
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
