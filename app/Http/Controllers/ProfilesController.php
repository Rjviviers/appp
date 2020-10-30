<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

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
        // $postCount =  ;
        $postCount = Cache::remember(
            'count.post.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            }
        );

        $folowersCount =  Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers()->count();
            }
        );
        // $folowersCount = $user->profile->followers()->count();
        $followingCount =  Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following()->count();
            }
        );
        // $followingCount = $user->following()->count();

        return view('profiles.index', compact('user', 'follows', 'postCount', 'folowersCount', 'followingCount'));
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