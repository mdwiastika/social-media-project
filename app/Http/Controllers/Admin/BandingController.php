<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banding;
use Illuminate\Support\Facades\Storage;

class BandingController extends Controller
{
    public function index()
    {
        $bandings = Banding::all();

        return view('admin.table.bandings.main', [
            'title' => 'Table Bandings',
            'bandings' => $bandings,
            'active' => 'table',
            'act' => 'tablebandings',
        ]);
    }

    public function destroy($id)
    {
        try {
            $banding = Banding::where('id', $id)->first();
            Storage::delete($banding->image);
            $banding->delete();

            return response()->json([
                'message' => 'Sukses hapus banding',
            ], 202);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 503);
        }
    }
}
