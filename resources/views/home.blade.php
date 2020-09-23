@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-3 p-5">
            <img height="150" src="https://via.placeholder.com/150" alt=""
                class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-bottom ">
                <h1>{{ $user->username }}</h1>
                <a href="#">add new post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>150</strong> posts</div>
                <div class="pr-5"><strong>500</strong> folowers</div>
                <div class="pr-5"><strong>5000</strong> folowing</div>
            </div>
            <div class="pt-4">
                <strong>{{ $user->profile->title ?? "need to enter" }}</strong>
            </div>
            <div>{{ $user->profile->description ?? "need to enter" }}</div>
            <div><a href="#" target="_blank" rel="noopener noreferrer">{{ $user->profile->url ?? "need to enter" }} </a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-4"><img src="https://via.placeholder.com/250" alt="" class="w-100 h-100"></div>
        <div class="col-4"><img src="https://via.placeholder.com/250" alt="" class="w-100"></div>
        <div class="col-4"><img src="https://via.placeholder.com/250" alt="" class="w-100"></div>
    </div>
</div>
@endsection