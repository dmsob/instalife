@extends('layouts.layout')

@section('content')

    <aside class="aside_wrapper col-4">
        <div class="avatar"></div>
        @guest
            <div class="name"> guest </div>
            @else
            <div class="name">{{ Auth::user()->name }} </div>
        @endguest
    </aside>
   <div>
       <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="avatar"></div>
                    <div class="name">{{ $post->name }}</div>
                </div>
                <div class="card-body">
                    <div class="card-img card-img__max" style="background-image:url({{ $post->img ?? asset('img/default.jpg') }});"></div>
                    <div class="card-descr"><b>{{ $post->name }}</b>: {{ $post->descr }}</div>
                    <div class="card-btn">
                        <a href="{{route('post.index')}}" class="btn btn-outline-primary">назад</a>
                        @auth
                            @if(Auth::user()->id == $post->author_id)
                                <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-outline-success">изменить</a>
                                <form action="{{route('post.destroy',['id'=>$post->id])}}" method="post" onsubmit="if ( confirm('Вы уверены?')) {return true} else {return false}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-outline-danger" value="Удалить">
                                </form>
                            @endif
                        @endauth
                    </div>
                    <div class="post_date">{{$post->created_at}} </div>
                </div>
            </div>
        </div>
        </div>
   </div>

@endsection
