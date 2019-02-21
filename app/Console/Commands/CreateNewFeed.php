<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\NewFeed;

class CreateNewFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:create {title} {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Feed';

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
        $title = $this->argument('title');
        $url = $this->argument('url');
        $newFeed = new NewFeed;
        $newFeed->title = $title;
        $newFeed->url = $url;
        $newFeed->save();
    }
}
