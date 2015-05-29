<?php	
	include_once("../phpModules/newDbConn.php");
	$sql = "select ca_name from g4_mw_category ";
	switch($board) {
		case "issue":
			$sql = $sql."where bo_table='Issue';"; //CONCAT TABLE NAME
			$fileName = "issue.php";
			break;
		case "interview":
			$sql = $sql."where bo_table='Interview';"; //CONCAT TABLE NAME
			$fileName = "interview.php";
			break;
		case "global":
			$sql = $sql."where bo_table='Global';"; //CONCAT TABLE NAME
			$fileName = "global.php";
			break;
		case "culture":
			$sql = $sql."where bo_table='Culture';"; //CONCAT TABLE NAME
			$fileName = "culture.php";
			break;
		case "womanMyth":
			$sql = $sql."where bo_table='WomanMyth';"; //CONCAT TABLE NAME
			$fileName = "womanMyth.php";
			break;
		case "plan":
			$sql = $sql."where bo_table='Plan';"; //CONCAT TABLE NAME
			$fileName = "plan.php";
			break;
		case "monitering":
			$sql = $sql."where bo_table='Monitering';"; //CONCAT TABLE NAME
			$fileName = "monitering.php";
			break;
	}
	$result = $db->query($sql) or die($sql);
	$result_num = $result->num_rows;
	echo "<option value=\"./".$fileName."?category=all\">카테고리를 선택해주세요.</option>";
	echo "<option value=\"./".$fileName."\">전체</option>";
	for($i=0; $i<$result_num; $i++) {
		$row = $result->fetch_assoc();
		echo "<option value='./".$fileName."?category=".$row['ca_name']."'>".$row['ca_name']."</option>";
	}
?>
