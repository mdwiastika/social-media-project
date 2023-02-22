<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $stories = Story::whereNot(function ($st) {
            $st->where('user_id', auth()->user()->id);
        })->latest()->get();

        return view('admin.table.stories.main', [
            'title' => 'Table Story',
            'stories' => $stories,
            'active' => 'table',
            'act' => 'tablestories',
        ]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story): JsonResponse
    {
        if ($story->active == 'true') {
            $story->active = 'false';
        } else {
            $story->active = 'true';
        }
        $story->save();

        return response()->json([
            'message' => 'Success change user status',
            'story' => $story,
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        //
    }
}
