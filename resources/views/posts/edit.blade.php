@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="post">
        @csrf
        
        @method('PUT')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Post</h1>
                </div>
    
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Title</label>
    
                        <input id="caption" 
                               type="text" 
                               class="form-control @error('caption') is-invalid @enderror" 
                               name="caption"
                               value="{{ old('caption') ?? $post->caption}}">
    
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                </div>
                <div class="form-group row">
                    
                    <label for="full_text" class="col-md-4 col-form-label">Post Content</label>

                    <input type="text" 
                           class="form-control" 
                           id="full_text" 
                           name="full_text" 
                           value="{{ old('full_text') ?? $post->full_text}}">

                    @error('full_text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="row pt-4">
                    <button class="btn btn-primary">Update Post</button>
                </div>
            </div>
        </div>
        
    </form>
</div>
@endsection
