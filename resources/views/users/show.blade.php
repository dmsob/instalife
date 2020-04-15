@extends('layouts.layout')

@section('content')

   <div>
       <div class="row">
        <div class="col-12 ">
            <div class="card align-content-center">
                <div class="card-header">
                    <div class="avatar"></div>
                    <div>
                        <b>{{$user->name}}</b>
                    </div>
                </div>
                <div class="card-body">

                    <div class="card-descr"><b>Email: </b> {{$user->email}}</div>

                    Здесь будут различные данные пользователя...
                    <div class="card-btn">
                        <a href="{{route('post.index')}}" class="btn btn-outline-primary">назад</a>
                        @auth
                            @if(Auth::user()->id == $user->id)
                                <a href="{{route('user.edit',['id'=> Auth::user()->id ])}}" class="btn btn-outline-success">изменить</a>
                                <form action="{{route('user.destroy',['id'=>Auth::user()->id])}}" method="post" onsubmit="if ( confirm('Вы уверены?')) {return true} else {return false}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-outline-danger" value="Удалить">
                                </form>
                            @endif
                        @endauth
                    </div>
                    <br>
                    <hr>
                    <h3>Публикации пользователя</h3>
                    <div class="row">
                        @foreach($user->posts as $post)
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="avatar"></div>
                                        <div class="name">{{ $post->name }}</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-img" style="background-image:url({{ $post->img ?? asset('img/default.jpg') }});"></div>
                                        <div class="card-descr"> {{ mb_strlen($post->descr)>190 ? mb_substr($post->descr, 0, 190) . '...' : $post->descr }}</div>
                                        <a href="{{route('post.show',['id' => $post->id])}}" class="btn btn-outline-primary">Посмотреть</a>
                                        <div class="post_date">{{$post->created_at}} </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        </div>
   </div>

@endsection
