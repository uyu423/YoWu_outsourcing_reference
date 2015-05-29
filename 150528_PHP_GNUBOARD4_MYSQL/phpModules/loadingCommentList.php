<?php
	include_once("../phpModules/newDbConn.php");
	$sql = "select * from custom_comments where co_parentBo='".$board."' and co_wr_id=".$_GET['wr_id']." order by co_idx asc";
	$db->query($query);
	$result = $db->query($sql) or die($sql);
	$num_result = $result->num_rows;
	
	
	if($num_result <= 0) {
		echo "<p class=\"addTotal\"> 덧글이 없습니다.</p>";
	}
	else {
		echo "<p class=\"addTotal\">전체덧글<span class=\"totalNum\">(".$num_result.")</span></p>";
		for($i=0; $i<$num_result; $i++) {
			$row = $result->fetch_assoc();
			echo "<ul class=\"addTextArea\">";
			echo "<li><span class=\"addWriter\">".$row['co_name']." (".$row['co_id'].")</span> ".$row['co_datetime']."</li>";
			echo "<li>".$row['co_comment']."</li>";
			echo "<li class=\"addBtnArea\">";
			echo "<a href=\"../phpModules/modifyCommnet.php?co_idx".$row['co_idx']."\"><img src=\"../img/journal/downBtn.png\" alt=\"댓글 수정\" /></a>";
			echo "<a href=\"../phpModules/deleteCommnet.php?co_idx".$row['co_idx']."\"><img src=\"../img/journal/closeBtn.png\" alt=\"댓글 삭제\" /></a>";
			echo "</li></ul>";
		}
	}
?>
