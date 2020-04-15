<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('post.index')->withErrors('Пользователь не найден');
        }

        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('post.index')->withErrors('Пост не найден');
        }

        /*if ($user->author_id != Auth::user()->id) {
            return redirect()->route('post.index')->withErrors('Не достаточно прав');
        }*/

        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('post.index')->withErrors('Пользователь не найден');
        }

        if ($user->id != Auth::user()->id) {
            return redirect()->route('post.index')->withErrors('Не достаточно прав');
        }

        $user->name = $request->name;
        $user->email = $request->email;

       /* if ($request->file('img')) {
            $path = Storage::put('public', $request->file('img'));
            $url = Storage::url($path);
            $user->avatar = $url;
        }*/

        $user->update();

        return redirect()->route('user.show', compact('id'))->with('success', 'Пользователь успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
