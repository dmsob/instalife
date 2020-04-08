<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;




class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search){
            $posts = Post::join('users','author_id', '=','users.id')
                ->Where('descr', 'like', '%'.$request->search.'%')
                ->orWhere('name', 'like', '%'.$request->search.'%')
                ->orderBy('posts.created_at', 'desc')
                ->get();
            return view('posts.index', compact('posts'));
        }

        $posts = Post::join('users', 'posts.author_id', '=','users.id')
            ->select('posts.*', 'users.name')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(4);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->descr = $request->descr;
        $post->author_id = Auth::user()->id;

        if ($request->file('img')) {
            $path = Storage::put('public', $request->file('img'));
            $url = Storage::url($path);
            $post->img = $url;
        }

        $post->save();

        return redirect()->route('post.index')->with('success', 'Пост успешно создан!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::join('users','author_id', '=','users.id')
            ->select('posts.*', 'users.name')
            ->find($id);

        if (!$post) {
            return redirect()->route('post.index')->withErrors('Пост не найден');
        }

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('post.index')->withErrors('Пост не найден');
        }

        if ($post->author_id != Auth::user()->id) {
            return redirect()->route('post.index')->withErrors('Не достаточно прав');
        }

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('post.index')->withErrors('Пост не найден');
        }

        if ($post->author_id != Auth::user()->id) {
            return redirect()->route('post.index')->withErrors('Не достаточно прав');
        }

        $post->descr = $request->descr;

        if ($request->file('img')) {
            $path = Storage::put('public', $request->file('img'));
            $url = Storage::url($path);
            $post->img = $url;
        }

        $post->update();

        return redirect()->route('post.show', compact('id'))->with('success', 'Пост успешно изменен!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->author_id != Auth::user()->id) {
            return redirect()->route('post.index')->withErrors('Не достаточно прав');
        }
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Пост успешно удален!');
    }
}
