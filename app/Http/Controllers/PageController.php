<?php

namespace App\Http\Controllers;

use App\Models\User;

class PageController extends Controller
{
    public function profile()
    {
        $user = User::first();

        return view('pages.profile', ['user' => $user]);
    }

    public function about()
    {
        return view('pages.about');
    }
}