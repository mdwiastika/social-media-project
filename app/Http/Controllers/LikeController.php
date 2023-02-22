<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     */
    public function store(Request $request): JsonResponse
    {
        $coba = Like::where('user_id', auth()->user()->id)->where('post_id', $request->post_id)->exists();
        if ($coba) {
            $hapuss = Like::where('user_id', auth()->user()->id)->where('post_id', $request->post_id)->delete();

            return response()->json($coba);
        } else {
            $like = new Like();
            $like->user_id = $request->user_id;
            $like->post_id = $request->post_id;
            $like->user_name = $request->user_name;
            $like->save();

            return response()->json($like);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
