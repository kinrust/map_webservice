<?php

$sdb_name = "127.0.0.1";
$user_name = "rustam";
$user_password = "qweasdzxc";
$db_name = "rustam";

// соединение с сервером базы данных
if(!$link = mysql_connect($sdb_name, $user_name, $user_password))
{
  echo "<br>Не могу соединиться с сервером базы данных<br>";
  exit();
}

// выбираем базу данных
if(!mysql_select_db($db_name, $link))
{
  echo "<br>Не могу выбрать базу данных<br>";
  exit();
}

mysql_query('SET NAMES utf8');

?>
