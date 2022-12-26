<?php
  require("db_config.php");
  $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
  mysql_query("set names 'utf8'"); //数据库输出编码
  mysql_select_db($mysql_database); //打开数据库
  $result = mysql_query("select * from study");
  $data="";
  $array= array();
  class User{
    public $name;
    public $age;
  }
  while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
    $user=new User();
    $user->name = $row['name'];
    $user->age = $row['age'];
    $array[]=$user;
  }
  $data=json_encode($array);
  // echo "{".'"user"'.":".$data."}";
  echo $data;
?>