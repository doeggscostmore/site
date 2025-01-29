<?php

namespace App\Http\Controllers;

use App\Models\Subreddit;
use App\Reddit;
use Illuminate\Http\Request;

class RedditApi extends Controller
{
    public function comment(Request $request)
    {
        $comment = $request->post('comment');
        if (!$comment) {
            abort(400);
        }

        $body = $request->post('body');
        if (!$body) {
            abort(400);
        }

        // We could probably do this async, but we don't.
        $reddit = new Reddit(
            config('app.reddit.app_id'),
            config('app.reddit.secret'),
            config('app.reddit.username'),
            config('app.reddit.password'),
        );

        $reddit->HandleComment($comment, $body);
        return response()->json(['status' => 'ok']);
    }

    public function getSubreddits()
    {
        $subreddits = Subreddit::all()->pluck('subreddit');

        return response()->json(['data' => $subreddits]);
    }
}
