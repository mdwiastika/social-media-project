<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Banding;
use App\Models\Post;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::where('role', 'user')->count();
        $posts = Post::count();
        $stories = Story::count();
        $bandings = Banding::count();

        return view('admin.dashboard.main', [
            'title' => 'Dashboard',
            'user' => auth()->user(),
            'active' => 'Dashboard',
            'act' => 'Dashboard',
            'user_count' => $users,
            'post_count' => $posts,
            'story_count' => $stories,
            'banding_count' => $bandings,
        ]);
    }
}
