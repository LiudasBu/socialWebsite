<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        if($user->status != 'admin') return view('profiles.index', compact('user'));
    }
}
