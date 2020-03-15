@extends('layouts.layout')

@section('content')
    @if  (isset($_GET['search']))
        @if(count($posts)>0)
                <h2>Результаты по запросу: <?=$_GET['search']?></h2>
                <p class="lead">Всего найдено: {{count($posts)}} </p>
            @else
                <h2>По запросу <?=$_GET['search']?> ничего не найдено</h2>
                <a href="{{route('post.index')}}" class="btn btn-outline-primary">Показать все записи</a>
        @endif
    @endif
    <aside class="aside_wrapper col-4">
        <div class="avatar"></div>
        <div class="name">name</div>
    </aside>
   <div>
       <div class="row">
        @foreach($posts as $post)
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <div class="avatar"></div>
                    <div class="name">{{ $post->name }}</div>
                </div>
                <div class="card-body">
                    <div class="card-img" style="background-image:url({{ $post->img ?? asset('img/default.jpg') }});"></div>
                    <div class="card-descr"><b>{{ $post->name }}</b>: {{ mb_strlen($post->descr)>190 ? mb_substr($post->descr, 0, 190) . '...' : $post->descr }}</div>
                    <div class="post_date">{{$post->created_at->diffForHumans()}} </div>
                </div>
            </div>
        </div>
        @endforeach
       </div>
   </div>

    @if (!isset($_GET['search']))
    {{ $posts->links() }}
    @endif

@endsection
