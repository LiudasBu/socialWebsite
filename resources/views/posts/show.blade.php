@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h5 pb-4">{{$post->full_text}}</div>
    @can ('update', $post)
        <a href="/p/{{$post->id}}/edit">Edit Post</a>
    @endcan
    @can ('delete', $post)
    <div class="row pt-4">
        <a href="{{ route('post.delete', $post->id) }}"><button class="btn btn-danger">Delete</button></a>
    </div>    
    @endcan
    <definition-finder></definition-finder>
</div>
@endsection
