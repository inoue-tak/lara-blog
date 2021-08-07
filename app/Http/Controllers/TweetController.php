<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetController extends Controller
{
    //
    public function showTimelinePage()
    {
        $tweets = Tweet::latest()->get();
        return view('timeline', ['tweets' => $tweets]); 
    }

    public function postTweet(Request $request)
    {
        $validator = $request->validate([
            'tweet' => ['required', 'string', 'max:280'],
        ]);
        Tweet::create([
            'user_id' => 1, 
            'tweet' => $request->tweet,
        ]);
        return back(); 
    }

    public function destroy($id)
    {
        $tweet = Tweet::find($id);
        $tweet->delete();

        return redirect()->route('timeline');
    }


}
