<?php

class Feed
{
    /**
     * @var FeedItem[]
     */
    public $items;

}

class FeedItem
{
    public $price,
        $name,
        $description,
        $url;

    public function __construct($price, $name, $description, $url)
    {
        $this->price = $price;
        $this->name = $name;
        $this->description = $description;
        $this->url = $url;
    }
}
