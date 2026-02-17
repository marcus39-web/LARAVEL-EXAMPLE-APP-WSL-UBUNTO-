<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::addSelect([
            'post_count' => \App\Models\Post::selectRaw('COUNT(*)')
                ->whereColumn('user_id', 'users.id'),
            'last_post_date' => \App\Models\Post::select('created_at')
                ->whereColumn('user_id', 'users.id')
                ->latest()
                ->take(1),
        ])
        ->where('status', 'active')
        ->orderBy('name', 'asc')
        ->get();
        return view('dashboard', compact('users'));
    }
}
