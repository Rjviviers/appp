@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-3 p-5">
        <img height="150" src="{{ $user->profile->profileImage() }}" alt=""
                class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-bottom ">
                <h1>{{ $user->username }}</h1>

                <follow-button userid="{{ $user->id }}" follows="{{$follows}}"></follow-button>

                @can('update', $user->profile)
                    <a href="/p/create">add new post</a>
                @endcan


            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">edit profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $folowersCount}}</strong> folowers</div>
                <div class="pr-5"><strong>{{ $followingCount}}</strong> folowing</div>
            </div>
            <div class="pt-4">
                <strong>{{ $user->profile->title ?? "need to enter" }}</strong>
            </div>
            <div>{{ $user->profile->description ?? "need to enter" }}</div>
            <div><a href="{{ $user->profile->url ?? "#" }}" target="_blank" rel="noopener noreferrer">{{ $user->profile->url ?? "need to enter" }} </a></div>
        </div>
    </div>
    <div class="row">

        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{ $post->img }}" alt="" class="w-100">
                </a>

            </div>
        @endforeach

    </div>
</div>
@endsection
