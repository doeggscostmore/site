<?php

namespace App\Http\Controllers;

use App\Data;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    public function event($slug) {
        $event = Cache::remember("category_{$slug}", Data::CACHE_TIME, function() use ($slug) {
            return Event::where('slug', $slug)->first();
        });

        if (!$event) {
            abort(404);
        }

        return view('event', [
            'event' => $event,
            'canonical' => route('event', ['id' => $event->slug])
        ]);
    }
}