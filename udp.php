<?php

//创建服务器
$server = new swoole_server("0.0.0.0", 9502,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);
$server->on('packet', function ($server,$data, $fd){
    $num = 1000;
    for($i=0;$num >=$i;$i++){
        $server->sendto($fd['address'],$fd['port'],$i."：$data");
        echo $i;
    }

});

$server->start();
