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
//$host = '0.0.0.0';
//$port = 9501;
//$service = new swoole_server($host,$port);
//$service->on('connect',function($serv,$fd){
//    echo "建立连接\n";
//    var_dump($serv);
//    var_dump($fd);
//});
//$service->on('receive',function($serv,$rd,$fromId,$data){
//    echo "接收到数据\n";
//    var_dump($data);
//});
//$service->on('close',function($service,$rd){
//   echo "服务关闭\n";
//});
//
//$service->start();