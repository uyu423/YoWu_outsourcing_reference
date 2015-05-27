<?php
	$mysql_hostname = "";
	$mysql_username = "";
	$mysql_password = "";
	$mysql_dbname = "";
	
	@ $db = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_dbname);
	if(mysqli_connect_errno()) {
		echo "DB connect Error";
		exit;
	}
	
    $query = "set names utf8;";
    $result = $db->query($query) or die ("query error");
    /*$query = "set session character_set_connection=utf8;";
    $result = $db->query($query) or die ("query error");
    $query = "set session character_set_result=utf8;";
    $result = $db->query($query) or die ("query error");
    $query = "set session character_set_client=utf8;";
    $result = $db->query($query) or die ("query error");*/
?>
