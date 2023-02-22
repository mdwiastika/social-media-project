<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banding;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BandingController extends Controller
{
    public function index(): View
    {
        $bandings = Banding::all();

        return view('admin.table.bandings.main', [
            'title' => 'Table Bandings',
            'bandings' => $bandings,
            'active' => 'table',
            'act' => 'tablebandings',
        ]);
    }

    public function destroy($id): JsonResponse
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
