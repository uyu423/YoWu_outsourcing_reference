<?php 
	include_once("../phpModules/newDbConn.php");
	$wr_id = $_GET['wr_id'];
	switch($board) {
		case "notice":
			$sql = "select * from g4_write_Notice where wr_id = ".$wr_id;
			break;
		case "issue":
			$sql = "select * from g4_write_Issue where wr_id = ".$wr_id;
			break;
		case "plan":
			$sql = "select * from g4_write_Plan where wr_id = ".$wr_id;
			break;
		case "culture":
			$sql = "select * from g4_write_Culture where wr_id = ".$wr_id;
			break;
		case "interview":
			$sql = "select * from g4_write_Interview where wr_id = ".$wr_id;
			break;
		case "global":
			$sql = "select * from g4_write_Global where wr_id = ".$wr_id;
			break;
		case "womanMyth":
			$sql = "select * from g4_write_WomanMyth where wr_id = ".$wr_id;
			break;
		case "monitering":
			$sql = "select * from g4_write_Monitering where wr_id = ".$wr_id;
			break;
		case "ifrang":
			$sql = "select * from g4_write_Ifrang where wr_id = ".$wr_id;
			break;
		case "womanMeeting":
			$sql = "select * from g4_write_WomanMeeting where wr_id = ".$wr_id;
			break;
		case "photo":
			$sql = "select * from g4_write_Photo where wr_id = ".$wr_id;
			break;
	}
	
	$result = $db->query($sql) or die($sql);
 	$row = $result->fetch_assoc();
?>

