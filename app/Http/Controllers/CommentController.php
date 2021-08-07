<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CommentRequest;
use App\Post;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function create($post_id)
    {
        $post = Post::find($post_id);

        return view('comments.create',compact('post'));
    }
    //


    public function store(CommentRequest $request)
    {

        $post = Post::find($request->post_id); //インスタンスを確認
        $comment = new Comment; //インスタンスを作成
        $comment -> body   = $request -> body; //ユーザー入力のtitleを代入
        $comment -> user_id   = Auth::id(); //ユーザー入力のtitleを代入
        $comment -> post_id   = $request -> post_id; //ユーザー入力のtitleを代入
        
        $comment -> save(); //保存
        return view('posts.show', compact('post'));

    }



}
