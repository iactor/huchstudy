<?php

header("Content-type:text/html;charset=utf-8");
//创建服务器
$server = new swoole_server("0.0.0.0", 9505);
//设置异步 进程工作数
$server->set(array('task_worker_num'=>4));
//投递异步任务
$server->on('receive',function($server,$rd,$from_id,$data){
    $task_id = $server->task($data);// 异步ID
    echo "异步id：$task_id\n";
});
//处理异步任务
$server->on('task',function ($server,$task_id,$from_id,$data){
    echo "执行异步ID：$task_id";
    $server->finish("$data  ->ok");
});
//处理结果
$server->on('finish',function($server,$task_id,$data){
    echo "finish";
});
$server->start();

