<?php
	include_once("./phpModules/newDbConn.php");
	$sql = "SELECT wr_big, wr_board, wr_board_en, wr_id, wr_subject, ";
	$sql = $sql."date_format(wr_datetime, '%Y-%m-%d') as wr_datetime, wr_datetime as ori_datetime ";
	$sql = $sql."FROM dbonlineifftp.view_totalPost_Main order by ori_datetime desc limit 0, 7;";
	$db->query($query);
	$result = $db->query($sql) or die($sql);
	$num_result = $result->num_rows;
	
	if($num_result <= 0) {
		echo "<dd>게시물이 없습니다.</dd>";
	}
	else {
		for($i=0; $i<$num_result; $i++) {
			$row = $result->fetch_assoc();
			switch($row['wr_board_en']) {
				case "global":
					$fileName = "./ifNews/globalView.php";
					break;
				case "interview":
					$fileName = "./ifNews/interviewView.php";
					break;
				case "issue":
					$fileName = "./ifNews/issueView.php";
					break;
				case "monitering":
					$fileName = "./ifNews/moniteringView.php";
					break;
				case "notice":
					$fileName = "./introIf/noticeView.php";
					break;
				case "photo":
					$fileName = "./ifImage/photoView.html";
					break;
				case "plan":
					$fileName = "./ifNews/planView.php";
					break;
				case "womanMeet":
					$fileName = "./ifPeople/womanMeetingView.php";
					break;
				case "video":
					$fileName = "./ifImage/video.php";
					break;
				case "womanMyth":
					$fileName = "./ifNews/womanMyth.php";
					break;
			}
			echo "<dd><span class=\"red\">[".$row['wr_big']."] </span>";
			echo "<a href=\"".$fileName."?wr_id=".$row['wr_id']."\">".$row['wr_board']." - ".$row['wr_subject']."</a>";
			echo "<span class=\"date\">".$row['wr_datetime']."</span></dd>";
		}
	}
?>
