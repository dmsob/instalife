@extends('layouts.layout')

@section('content')
    <form action="{{ route('post.update', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h3>Редактировать пост</h3>
        @include('posts.parts.form')
        <input type="submit" value="Сохранить" class="btn btn-outline-success">
    </form>
@endsection
