<?php
header("content-type:text/html;charset:utf-8");

require_once 'mysql.class.php';

$mysql = new MySQL('localhost','user','password','test');

echo '<pre>';
//获取表字段
//print_r($mysql->getFields('test'));
//增
echo $mysql->data(array('name'=>'test','password'=>'123456'))->table('test')->add();
//删
echo $mysql->table('test')->where('id=1')->delete();
//改
echo $mysql->table('test')->data(array('name'=>'bbbbbbbbbbbb'))->where('id<3')->update();
//查
print_r($mysql->table('test')->where('id=4')->select());
print_r($mysql->table('test')->order('id desc')->select());

//
$mysql->query('select * from `test`');
$mysql->execute('update `test` set password = 123');

echo '</pre>';
echo '查询次数:'.$mysql->query_count.'<br>';
echo '查询时间:'.number_format(microtime(true)-($mysql->query_start_time),10).' 秒<br>';
echo '错误信息:'.$mysql->error().'<br>';
?>
