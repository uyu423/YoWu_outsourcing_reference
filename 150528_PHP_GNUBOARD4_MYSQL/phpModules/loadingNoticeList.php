<?php 
	include_once("./newDbConn.php");
	$page = $_GET['page'];
	$maxPost = 10;
	$stIndex = ($page * $maxPost) - $maxPost;
	$edIndex = ($page * $maxPost);
	
	$sql = "select wr_id, wr_subject, date_format(wr_datetime, \"%Y-%c-%e\") as wr_datetime "
			."from g4_write_Notice order by wr_id desc limit ".$stIndex.", ".$maxPost;
	$result = $db->query($sql) or die($sql);;
	
	$num_result = $result->num_rows;
    for($i=0; $i<$num_result; $i++) {
		$row = $result->fetch_assoc();
		echo "<tr>\n";
		echo "<td>".$row['wr_id']."</td>\n";
		echo "<td><a href=\"./noticeView.php?wr_id=".$row['wr_id']."\">".$row['wr_subject']."</td>\n";
		echo "<td>".$row['wr_datetime']."</td>\n";
		echo "</tr>\n";
	}
?>

