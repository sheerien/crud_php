<?php

// crud_php_terasoft

//db connection info
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'crud_php_terasoft';
/**
 * @var mixed $db_connect
 */
$db_connect = mysqli_connect($host,$user,$password,$db_name);

if(!$db_connect){
   die('connection failed' . mysqli_connect_error());
}
