<?php
namespace App\Services;

class ParseNewFeedService
{
    public static function parseItemsNewFeed($url)
    {
        try {
            $xml = simplexml_load_file($url);
            if ($xml->getName() == 'rss') {
                return self::parseRssFeed($xml);
            } else if ($xml->getName() == 'feed') {
                return self::parseAtomFeed($xml);
            }
        } catch (\Exception $e) {
            return [];
        }

        return [];
    }

    public static function parseAtomFeed(\SimpleXMLElement $xml)
    {
        $itemList = [];

        foreach ($xml->entry as $element) {
            $itemData = [
                'title' => $element->title,
                'pubDate' => $element->updated,
            ];
            $itemList[] = $itemData;
        }

        return $itemList;
    }

    public static function parseRssFeed(\SimpleXMLElement $xml)
    {
        $itemList = [];

        foreach ($xml->channel->item as $element) {
            $itemData = [
                'title' => $element->title,
                'pubDate' => $element->pubDate,
            ];
            $itemList[] = $itemData;
        }

        return $itemList;
    }
}