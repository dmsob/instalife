@extends('layouts.layout')

@section('content')
    <form action="{{ route('user.update', ['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h3>Редактировать пользователя</h3>
        @include('users.parts.form')
        <input type="submit" value="Сохранить" class="btn btn-outline-success">
    </form>
@endsection
