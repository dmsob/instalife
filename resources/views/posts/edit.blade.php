@extends('layouts.layout')

@section('content')
    <form action="{{ route('post.update', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Редактировать пост</h3>
        <div class="form-group">
            <input name="title" type="text" class="form-control" required value="{{$post->title}}">
        </div>
        <div class="form-group">
            <textarea name="descr" rows="3" class="form-control" required>{{$post->descr}}</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="img">
        </div>
        <input type="submit" value="Сохранить" class="btn btn-outline-success">
    </form>
@endsection
