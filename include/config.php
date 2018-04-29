<?php
$DB = array(
    "server"=>"localhost",
    "name"=>"todo",
    "user"=>"root",
    "password"=>""
);

$DBConnect = mysql_connect($DB['server'], $DB['user'], $DB['password']);
$DBSelect = mysql_select_db($DB['name']);

// Time Zone
date_default_timezone_set("America/New_York");

  function refresh($page,$sec){
    echo"
        <meta http-equiv='refresh' content='".$sec."; url=".$page."' />
    ";
  }
?>