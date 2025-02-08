<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user1 = request()->user();
        $user2 = Auth::user();
        $user3 = request()->user();

        return view('profile', [
            'user' => $user1
        ]);
    }
}
