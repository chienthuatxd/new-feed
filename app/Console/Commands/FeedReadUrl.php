<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\NewFeed;

class FeedReadUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:read-url {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display list items of feed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = $this->argument('url');
        $newFeed = NewFeed::where('url', $url)->first();
        if ($newFeed) {
            $itemList = ParseNewFeedService::parseItemsNewFeed($newFeed->url);
            $headers = ['Title', 'Published Date'];

            $this->table($headers, $itemList);
        } else {
            $this->error('New feed not found');
        }
    }
}
