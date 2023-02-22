<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Post;
use App\Models\Story;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StoryController extends Controller
{
    public function create(): View
    {
        $data = Follow::where('following_user_id', auth()->User()->id)->count();
        $countMessage = ChMessage::where('to_id', Auth::id())->where('seen', 0)->count();

        return view('create-story', [
            'title' => 'Form Story',
            'user' => auth()->User()->id,
            'count' => Post::where('user_id', auth()->user()->id)->get(),
            'followers' => $data,
            'likeUser' => Like::where('user_id', auth()->user()->id)->pluck('user_id'),
            'likePost' => Like::where('user_id', auth()->user()->id)->pluck('post_id'),
            'unreadMessage' => $countMessage,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'image' => 'required|file|max:5000',
        ]);
        if ($request->has('image')) {
            $validatedData['image'] = $request->file('image')->store('stories');
        }
        $validatedData['seen'] = 1;
        $validatedData['user_id'] = Auth::id();
        Story::create($validatedData);

        return redirect('/feed');
    }

    public function destroy($id)
    {
    }
}
