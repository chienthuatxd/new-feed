<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\NewFeed;
use App\Services\ParseNewFeedService;
use App\Console\Commands\DisplayFeed\DisplayFeed;

class FeedRead extends Command
{
    use DisplayFeed;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:read {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read one a new feed';

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
        $newFeedId = $this->argument('id');
        $newFeed = NewFeed::find($newFeedId);
        $this->display($newFeed);
    }
}
