@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->img}}" alt="" srcset="" class="w-100">
            </div>
            <div class="col-4">
                <div class="row align-items-center">

                    <div class="col-2">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" alt="{{ $post->user->username }}">
                    </div>
                    <div class="col-10">
                        <div class="font-weight-bold">
                            <span>
                                 <a href="/profile/{{$post->user->id}}">
                                    <span class="text-dark">
                                        {{ $post->user->username }}
                                    </span>
                                </a>
                                <a href="#" class="pl-3">follow</a>
                            </span>
                        </div>
                    </div>
                </div>
                <hr>

            <p>
                <span class="font-weight-bold">
                    <a href="/profile/{{$post->user->id}}"><span class="text-dark">  {{ $post->user->username }} </span></a>
                </span>
                {{$post->caption}}
            </p>
            </div>
        </div>

    </div>
@endsection
