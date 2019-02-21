<?php

use Illuminate\Database\Seeder;
use App\Models\NewFeed;

class NewFeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $urls = [
            'Thoi su VnExpress' => 'https://vnexpress.net/rss/thoi-su.rss',
            'The gioi VnExpress' => 'https://vnexpress.net/rss/the-gioi.rss',
            'Kinh doanh VnExpress' => 'https://vnexpress.net/rss/kinh-doanh.rss',
            'Startup VnExpress' => 'https://vnexpress.net/rss/startup.rss',
            'Giai tri VnExpress' => 'https://vnexpress.net/rss/giai-tri.rss',
        ];
        foreach ($urls as $title => $url) {
            factory(NewFeed::class)->create([
                'title' => $title,
                'url' => $url,
            ]);
        }
    }
}
