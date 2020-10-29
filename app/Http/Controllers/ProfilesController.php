<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth\
class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(\App\Models\User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(\App\Models\User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $data = request()->validate([
            'title'=>'required',
            'description'=> 'required',
            'url'=>'url',
            'img'=>'image',
        ]);
        auth()->user()->profile->update($data);
        return redirect("/profile/{$user->id }");
    }
}


// $data = request()->validate([
//     'title' => 'required' ,
//     'description' => 'required',
//     'url' => 'url',
//     'image'=>'',
// ]);
// auth()->user()->profile->update($data);
// return redirect("/profile/{$user->id}/");