<?php 
	include_once("../phpModules/newDbConn.php");
	$page = $_GET['page'];
	$maxPost = 10;
	$stIndex = ($page * $maxPost) - $maxPost;
	$edIndex = ($page * $maxPost);
	
	$sql = "select wr_id, wr_subject, date_format(wr_datetime, \"%Y-%c-%e\") as wr_datetime "
			."from g4_write_Notice ";
	if($_GET['selTxt']) {
		$sql = $sql."where wr_subject like '%".$_GET['selTxt']."%' ";
	}
	$sql = $sql."order by wr_id desc ";
	$sql_page = $sql;
	$sql = $sql."limit ".$stIndex.", ".$maxPost;
	$result = $db->query($sql) or die($sql);;
	
	$num_result = $result->num_rows;
	if($num_result <= 0) {
			echo "<td colspan='3'>검색된 내용이 없습니다.</td>";
	}
	else {
		for($i=0; $i<$num_result; $i++) {
			$row = $result->fetch_assoc();
			echo "<tr>\n";
			echo "<td>".$row['wr_id']."</td>\n";
			echo "<td><a href=\"./noticeView.php?wr_id=".$row['wr_id']."\">".$row['wr_subject']."</td>\n";
			echo "<td>".$row['wr_datetime']."</td>\n";
			echo "</tr>\n";
		}		
	}
?>
