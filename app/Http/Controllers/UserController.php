<?php

namespace App\Http\Controllers;

use App\Helpers\GetMidtrans;
use App\Models\ChMessage;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Topup;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user): View
    {
        $countMessage = ChMessage::where('to_id', Auth::id())->where('seen', 0)->count();
        $data = Follow::where('following_user_id', auth()->User()->id)->count();
        $coins = Topup::all();

        return view('profile', [
            'title' => 'profile',
            'posts' => Post::where('user_id', $user->id)->where('active', 'true')->latest()->get(),
            'usere' => $user,
            'count2' => Post::where('user_id', $user->id)->where('active', 'true')->get(),
            'count' => Post::where('user_id', auth()->user()->id)->where('active', 'true')->get(),
            'followers' => $data,
            'unreadMessage' => $countMessage,
            'coins' => $coins,
        ]);
    }

    public function payment(Request $request): View
    {
        $detail_item = [
            'id' => $request->id_topup,
            'price' => $request->price,
            'quantity' => 1,
            'name' => $request->name,
        ];
        $snapToken = GetMidtrans::getApiMidtrans($detail_item);
        $countMessage = ChMessage::where('to_id', Auth::id())->where('seen', 0)->count();
        $data = Follow::where('following_user_id', auth()->User()->id)->count();
        $coins = Topup::all();

        return view('payment', [
            'title' => 'Pay Now!',
            'snapToken' => $snapToken,
            'coin' => $request->coin,
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
    public function store(Request $request, User $user)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     */
    public function show(): View
    {
        // $data = Follow::where('following_user_id', auth()->User()->id)->count();
        // return view('profile', [
        //     'title' => 'profile',
        //     'posts' => Post::where('user_id', $user->id)->latest()->get(),
        //     'usere' => $user,
        //     'count' => Post::where('user_id', $user->id)->get(),
        //     'followers' => $data,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user): View
    {
        $data = Follow::where('following_user_id', auth()->User()->id)->count();
        $countMessage = ChMessage::where('to_id', Auth::id())->where('seen', 0)->count();

        return view('editprofile', [
            'title' => 'Edit Profile',
            'posts' => Post::where('user_id', $user->id)->latest()->get(),
            'usere' => $user,
            'count' => Post::where('user_id', $user->id)->get(),
            'followers' => $data,
            'unreadMessage' => $countMessage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $rules = [
            'name' => 'required|max:500',
            'username' => 'required|min:4|max:300|unique:users,username,'.auth()->id(),
            'profile' => 'image|file|max:6000',
            'bio' => 'max:500',
        ];
        $validatedData = $request->validate($rules);
        if ($request->file('profile')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['profile'] = $request->file('profile')->store('profile-images');
        }
        User::where('id', $user->id)->update($validatedData);

        return redirect('/profile/'.$user->username);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function search(Request $request): View
    {
        $user = '';
        if ($request->ajax()) {
            $user_filter = User::where('username', 'LIKE', '%'.$request->user_search.'%')->whereNot(function ($query) {
                $query->where('id', Auth::id());
            })->whereNot(function ($uf) {
                $uf->where('role', 'admin');
            })->where('active', 'true')->get();

            return view('get-user-search', [
                'users' => $user_filter,
            ]);
        }
    }

    public function explore(): View
    {
        $countMessage = ChMessage::where('to_id', Auth::id())->where('seen', 0)->count();

        return view('explore', [
            'title' => 'explore',
            'posts' => Post::where('user_id', auth()->User()->id)->latest()->get(),
            'user' => auth()->User()->id,
            'count' => Post::where('user_id', auth()->User()->id)->get(),
            'unreadMessage' => $countMessage,
        ]);
    }
}
