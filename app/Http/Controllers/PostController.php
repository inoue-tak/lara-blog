<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Comment;
use Auth;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //postsテーブルからデータを取得
        $posts = Post::all();

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //

        $post = new Post; //インスタンスを作成
        $post -> title     = $request -> title; //ユーザー入力のtitleを代入
        $post -> body      = $request -> body; //ユーザー入力のbodyを代入
        $post -> user_id   = Auth::id(); //ログイン中のユーザーidを代入

        $post -> save(); //保存

        return redirect()->route('posts.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //idで指定した特記事情報の取得
        $post = Post::find($id);
        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //idで指定した特記事情報の取得
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    
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
        //
        $post = Post::find($id); //インスタンスを確認
        $post -> title     = $request -> title; //ユーザー入力のtitleを代入
        $post -> body      = $request -> body; //ユーザー入力のbodyを代入
 
        $post -> save(); //保存
        return view('posts.show', compact('post'));
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
        $post = Post::find($id); //インスタンスを確認
 
        $post -> delete(); //削除
        return redirect()->route('posts.index');
    }
}
