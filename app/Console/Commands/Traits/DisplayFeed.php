<?php
namespace App\Console\Commands\DisplayFeed;

use App\Services\ParseNewFeedService;
trait DisplayFeed
{
    public function display($newFeed)
    {
        if ($newFeed) {
            $itemList = ParseNewFeedService::parseItemsNewFeed($newFeed->url);
            $itemList->transform(function ($item) {
                return $item = array_only($item, ['title', 'pubDate']);
            });
            $headers = [__('common.label_title'), __('common.label_publish_date')];

            $this->table($headers, $itemList);
            //TODO parse new feed to get list news
        } else {
            $this->error(__('common.error_not_found'));
        }
    }
}