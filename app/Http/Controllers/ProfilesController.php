<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

// use App\Http\Controllers\Auth\
class ProfilesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('profiles.index', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title'=>'required',
            'description'=> 'required',
            'url'=>'url',
            'img'=>'image',
        ]);

        if (request('img')) {
            $imagePath = request('img')->store('profile', 'public');
            // php intervention package
            // this is to crop images to square
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            auth()->user()->profile->update(array_merge(
                $data,
                ['img'=>$imagePath]
            ));
        } else {
            auth()->user()->profile->update($data);
        }

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