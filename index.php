<?php

//创建服务器
$host = '0.0.0.0';
$port = 9501;
$service = new swoole_server($host,$port);
$service->on('connect',function($serv,$fd){
    echo "建立连接\n";
    var_dump($serv);
    var_dump($fd);
});
$service->on('receive',function($serv,$rd,$fromId,$data){
    echo "接收到数据\n";
    var_dump($data);
});
$service->on('close',function($service,$rd){
   echo "服务关闭\n";
});

$service->start();