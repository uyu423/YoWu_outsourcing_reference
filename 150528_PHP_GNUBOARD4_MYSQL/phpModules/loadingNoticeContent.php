<?php 
	include_once("../phpModules/newDbConn.php");
	$wr_id = $_GET['wr_id'];
	switch($board) {
		case "notice":
			$sql = "select * from g4_write_Notice where wr_id = ".$wr_id;
			break;
		case "issue"
			$sql = "select * from g4_write_Issue where wr_id = ".$wr_id;
			break;
	}
	
	$result = $db->query($sql) or die($sql);
 	$row = $result->fetch_assoc();
?>

