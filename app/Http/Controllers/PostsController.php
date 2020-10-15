<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $data = request()->validate([
            'caption'=> 'required',
            'img'=> 'required|image',
        ]);

        $imagePath = request('img')->store('uploads', 'public');

        // php intervention package
        // this is to crop images to square
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'img' => $imagePath,
        ]);


        return redirect('/profile/' . auth()->user()->id);
    }
    //2 28 23
    public function show(\App\Models\Post $post)
    {
        return view('posts.show',compact('post'));
    }
}
