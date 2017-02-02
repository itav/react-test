<?php


require_once __DIR__ . '/../vendor/autoload.php';
require_once 'feed.php';
require_once 'big_object.php';

$app = function ($request, $response) use ($feed) {

    $str = '';
    for($i=0; $i<=20; $i++) {
        $idx = $i;
        $str .= 'name:&nbsp' . $feed->items[$idx]->name . '<br>';
        $str .= 'price:&nbsp' . $feed->items[$idx]->price . '<br>';
        $str .=  'description:&nbsp' . $feed->items[$idx]->description . '<br>';
    }
    $headers = array('Content-Type' => 'text/html');

    $response->writeHead(200, $headers);
    $response->end($str);
};

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);
$http = new React\Http\Server($socket);

$http->on('request', $app);

$socket->listen(1447);
$loop->run();