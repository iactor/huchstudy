<?php

//创建服务器
$host = '0.0.0.0';
$port = 9501;
$service = new swoole_server($host,$port);
$service->on('connect',function($serv,$fd){
    echo '建立连接';
    var_dump($serv);
    var_dump($fd);
});
