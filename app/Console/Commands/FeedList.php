<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\NewFeed;

class FeedList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show feed list';

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
        $headers = [__('common.label_id'), __('common.label_title'), __('common.label_url')];

        $newFeeds = NewFeed::all(['id', 'title', 'url'])->toArray();

        $this->table($headers, $newFeeds);
    }
}
