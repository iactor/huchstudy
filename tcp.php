<?php

//创建服务器
$server = new swoole_server("0.0.0.0", 9503);
$server->on('connect', function ($server, $fd){
    echo "connection open: {$fd}\n";
});
$server->on('receive', function ($server, $fd, $reactor_id, $data) {
    $server->send($fd, "Swoole: {$data}");
//    $server->close($fd);
});
$server->on('close', function ($server, $fd) {
    echo "connection close: {$fd}\n";
});


$server->start();
