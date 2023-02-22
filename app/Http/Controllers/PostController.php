<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\ChMessage;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Post;
use App\Models\Story;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, Request $request): View
    {
        $countMessage = ChMessage::where('to_id', Auth::id())->where('seen', 0)->count();
        $user = Auth::user()->follows->pluck('id');
        $user->push(auth()->user()->id);
        $storiesRaw = Story::whereIn('user_id', $user)->where('active', 'true')->where('created_at', '>=', Carbon::now()->subDay())->get();
        $storiesUser = $storiesRaw->groupBy('user_id');
        $postsaya = Post::whereIn('user_id', $user)->orWhere('user_id', Auth::user()->id)->where('active', 'true')->latest()->paginate(2);
        $latestPosts = Post::whereIn('user_id', $user)->orWhere('user_id', Auth::user()->id)->where('active', 'true')->latest()->limit(4)->get();
        $data = Follow::where('following_user_id', auth()->User()->id)->count();
        $randomFollow = User::whereNot(function ($rf) {
            $rf->where('id', Auth::id());
        })->whereNot(function ($rn) {
            $rn->where('role', 'admin');
        })->whereNotIn('id', $user)->where('active', 'true')->inRandomOrder()->limit(2)->get();
        // dd($user);
        if ($request->ajax()) {
            return view('paginatefeed', [
                'title' => 'feed',
                'posts' => $postsaya,
                'user' => auth()->User()->id,
                'count' => Post::where('user_id', auth()->user()->id)->get(),
                'followers' => $data,
                'likeUser' => Like::where('user_id', auth()->user()->id)->pluck('user_id'),
                'likePost' => Like::where('user_id', auth()->user()->id)->pluck('post_id'),
            ]);
        }

        return view('feed', [
            'title' => 'feed',
            'posts' => $postsaya,
            'user' => auth()->User()->id,
            'count' => Post::where('user_id', auth()->user()->id)->where('active', 'true')->get(),
            'followers' => $data,
            'likeUser' => Like::where('user_id', auth()->user()->id)->pluck('user_id'),
            'likePost' => Like::where('user_id', auth()->user()->id)->pluck('post_id'),
            'storiesUser' => $storiesUser,
            'randomFollows' => $randomFollow,
            'latestPosts' => $latestPosts,
            'unreadMessage' => $countMessage,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post): View
    {
        $countMessage = ChMessage::where('to_id', Auth::id())->where('seen', 0)->count();
        $data = Follow::where('following_user_id', auth()->User()->id)->count();

        return view('create', [
            'title' => 'create',
            'count' => $post->where('user_id', auth()->User()->id)->get(),
            'followers' => $data,
            'unreadMessage' => $countMessage,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'content' => 'required|max:1500',
            'image' => 'required',
            'image.*' => 'file|max:6000',
        ]);
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $imageSolo) {
                $name = $imageSolo->store('imageini');
                $data[] = $name;
            }
            Post::create([
                'user_id' => auth()->user()->id,
                'content' => $request->content,
                'image' => base64_encode(serialize($data)),
            ]);
        }

        return redirect('/')->with('success', 'Create post successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post): View
    {
        $data = Follow::where('following_user_id', auth()->User()->id)->count();
        $countMessage = ChMessage::where('to_id', Auth::id())->where('seen', 0)->count();

        return view('edit', [
            'title' => 'edit',
            'count' => $post->where('user_id', auth()->User()->id)->get(),
            'post' => $post,
            'followers' => $data,
            'unreadMessage' => $countMessage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $rules = [
            'content' => 'required|max:1500',
            'image.*' => 'image|file|max:6000',
        ];
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            foreach ($request->file('image') as $imageSolo) {
                $name = $imageSolo->store('imageini');
                $data[] = $name;
            }
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['image'] = base64_encode(serialize($data));
        Post::where('id', $post->id)->update($validatedData);

        return redirect('/')->with('success', 'Update post successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post): RedirectResponse
    {
        if ($post->image) {
            foreach (unserialize(base64_decode($post->image)) as $imm) {
                Storage::delete($imm);
            }
        }
        $post->delete();

        return redirect('/feed')->with('warning', 'Delete post successfully!');
    }

    public function trending(): View
    {
        $countMessage = ChMessage::where('to_id', Auth::id())->where('seen', 0)->count();

        return view('trending', [
            'title' => 'trending',
            'posts' => Post::where('user_id', auth()->User()->id)->latest()->get(),
            'user' => auth()->User()->id,
            'count' => Post::where('user_id', auth()->User()->id)->get(),
            'unreadMessage' => $countMessage,
        ]);
    }
}
