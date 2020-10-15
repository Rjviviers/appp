@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="h2">
                        add new post
                    </div>

                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label">post caption</label>                  
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" caption="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus name="caption">
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="row">
                        <label for="img" class="col-md-4 col-form-label">post image</label>   
                        <input type="file" required name="img" id="img" class="form-control-file @error('image') is-invalid @enderror" >
                        @error('img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row pt-4">
                        <button class="btn btn-primary ">add new post</button>
                    </div>
                </div>
                
            </div>
        </form>
        
    </div>
    
@endsection