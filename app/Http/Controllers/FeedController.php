<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewFeed;
use App\Services\ParseNewFeedService;
use App\Models\App\Models;

class FeedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $feeds = NewFeed::all();

        return view('feeds.index', ['feeds' => $feeds]);
    }

    public function show($id)
    {
        $itemList = [];
        $feed = NewFeed::find($id);
        if ($feed) {
            $itemList = ParseNewFeedService::parseItemsNewFeed($feed->url);
        }

        return view('feeds.show', ['itemList' => $itemList]);
    }

    public function create()
    {
        return view('feeds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'url'=> 'required|url',
        ]);
        $feed = new NewFeed([
            'title' => $request->get('title'),
            'url'=> $request->get('url'),
        ]);
        $feed->save();
        return redirect('/feeds')->with('success', __('common.message_create_success'));
    }

    public function destroy($id)
    {
        $feed = NewFeed::find($id);
        $feed->delete();

        return redirect('/feeds')->with('success', __('common.message_delete_success'));
    }
}
