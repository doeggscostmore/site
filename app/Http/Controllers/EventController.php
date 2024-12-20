<?php

namespace App\Http\Controllers;

use App\Data;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    public function event($slug)
    {
        $event = Cache::remember("eventmeta_{$slug}", Data::CACHE_TIME, function () use ($slug) {
            return Event::where('slug', $slug)->first();
        });

        if (!$event) {
            abort(404);
        }

        if ($event->date > now()->subDays(45)) {
            abort(404);
        }

        $categories = Data::Categories();
        $summaries = new Collection();
        foreach ($categories as $category) {
            $cache = 'categoryevent_' . sha1($category->slug . ':' . $event->date . ':' . $event->length);
            $eventSummary = Cache::remember($cache, Data::CACHE_TIME, function () use ($category, $event) {
                return $category->CalculateSummary($event->date, $event->length);
            });
            $summaries->add($eventSummary);
        }

        return view('event', [
            'event' => $event,
            'summaries' => $summaries,
            'canonical' => route('event', ['id' => $event->slug]),
            'upCount' => $summaries->where('isUp', '=', true)->count(),
        ]);
    }
}
