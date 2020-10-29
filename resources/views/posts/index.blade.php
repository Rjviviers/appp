@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
        <hr>
        <div class="row  offset-3 pt-4 pb-2">

            <div class="col-6 d-flex align-items-center">
                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-25 pr-4" style="max-width: 50px;" alt="{{ $post->user->username }}">
                <div class="font-weight-bold">
                    <span>
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">
                                {{ $post->user->username }}
                            </span>
                        </a>
                    </span>
                </div>
            </div>
            <hr>
        </div>

        <div class="row">
            <div class="col-6 offset-3">
                <img src="/storage/{{$post->img}}" alt="" srcset="" class="w-100">
            </div>
        </div>
        
        <div class="row">
            <div class="col-6 offset-3">
            <p>
                <span class="font-weight-bold">
                    <a href="/profile/{{$post->user->id}}"><span class="text-dark">  {{ $post->user->username }} </span></a>
                </span>
                {{$post->caption}}
            </p>
            </div>
        </div>


        @endforeach

        <div class="row">
            <div class="col-12">{{ $posts->links() }}</div>
        </div>

    </div>
@endsection
