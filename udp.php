<?php

//创建服务器
$server = new swoole_server("0.0.0.0", 9502,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);
$server->on('packet', function ($server,$data, $fd){
    $server->sendto($fd['address'],$fd['port'],"收到的数据：$data");
    var_dump($fd);
});

$server->start();
