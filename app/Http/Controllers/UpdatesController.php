<?php

namespace App\Http\Controllers;

use App\Models\UpdatePost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdatesController extends Controller
{
    public static function getPosts()
    {
        return collect([
            // new UpdatePost([
            //     'title' => 'Introducing Our Reddit Bot',
            //     'date' => new Carbon('2025-01-22'),
            //     'layout' => 'reddit-bot',
            //     'summary' => 'Test Summary',
            //     'slug' => 'introducing-our-reddit-bot',
            // ]),
        ]);
    }

    public function updates()
    {
        $posts = $this->getPosts();

        return view('updates', [
            'posts' => $posts->where('date', '<', now()),
        ]);
    }

    public function post($slug) {
        $posts = $this->getPosts();
        $post = $posts->where('slug', '=', $slug)->first();

        if (!$post) {
            abort(404);
        }

        return view('updates/' . $post->layout);
    }
}
