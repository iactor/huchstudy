<?php

//websocket
$server = new swoole_websocket_server("0.0.0.0", 9010);
//open 建立连接 $ws 服务器 ，$request:客户端信息
$server->on('open', function ($ws,$request){
    var_dump($request);
    $ws->push($request->fd,"welcome \n");
});
//message  接收信息
$server->on('message',function($ws,$request){
    echo "message $request->data";
    $ws->push($request->fd,"get it message");
});
//close
$server->on('close',function ($ws,$request){
    echo "close\n";
});
$server->start();
