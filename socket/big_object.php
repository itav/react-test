<?php

$feed = new Feed();
$i = 100000;

do{
    $price = rand(100000, 9999999) * $i;
    $name = md5($price);
    $description = base64_encode($name);
    $url = 'http://'.md5($name).'.pl';
    $feed->items[] = new FeedItem($price, $name, $description, $url);
}while(--$i);