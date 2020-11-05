@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="h4">Hello {{$user->username}}</div>
            @can ('update', $user->profile)
                <a href="/p/create">Add New Post</a>
            @endcan
        </div>
    </div>

    <div class="pt-5">
        @foreach($user->posts as $post)
            <div class="pt-2">
                <a href="/p/{{$post->id}}"><div class="">{{$post->caption}}</div></a>
            </div>
        @endforeach
        
    </div> 

</div>
@endsection
