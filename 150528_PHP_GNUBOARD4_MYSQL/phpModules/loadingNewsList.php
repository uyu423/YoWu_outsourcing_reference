<?php
	$page = $_GET['page'];
	$maxPost = 10;
	$stIndex = ($page * $maxPost) - $maxPost;
	$edIndex = ($page * $maxPost);
	$sql = "select wr_id, ca_name, wr_subject, wr_comment, date_format(wr_datetime, \"%Y-%c-%e\") as wr_datetime, ";
	$sql = $sql."left(wr_content, 30) as wr_contents, wr_content ";
	switch($board) {
		case "notice":
			$fileName = "notice.php";
			break;
		case "issue":
			$sql = $sql."from g4_write_Issue "; //CONCAT TABLE NAME
			$fileName = "issue.php"; //DEFINE FILENAME
			$viewName = "issueView.php"; //DEFINE FILENAME
			break;
		case "plan":
			$sql = $sql."from g4_write_Plan ";
			$fileName = "plan.php";
			$viewName = "planView.php"; //DEFINE FILENAME
			break;
		case "culture":
			$sql = $sql."from g4_write_Culture ";
			$fileName = "culture.php";
			$viewName = "cultureView.php"; //DEFINE FILENAME
			break;
		case "interview":
			$sql = $sql."from g4_write_Interview ";
			$fileName = "interview.php";
			$viewName = "interviewView.php"; //DEFINE FILENAME
			break;
		case "global":
			$sql = $sql."from g4_write_Global ";
			$fileName = "global.php";
			$viewName = "globalView.php"; //DEFINE FILENAME
			break;
		case "womanMyth":
			$sql = $sql."from g4_write_WomanMyth ";
			$fileName = "womanMyth.php";
			$viewName = "womanMythView.php"; //DEFINE FILENAME
			break;
		case "monitering":
			$sql = $sql."from g4_write_Monitering ";
			$fileName = "monitering.php";
			$viewName = "moniteringView.php"; //DEFINE FILENAME
			break;
		case "womanMeeting":
			$sql = $sql."from g4_write_WomanMeeting ";
			$fileName = "womanMeeting.php";
			$viewName = "womanMeetingView.php"; //DEFINE FILENAME
			break;
		case "ifrang":
			$sql = $sql."from g4_write_Ifrang ";
			$fileName = "ifRang.php";
			$viewName = "ifRangView.php"; //DEFINE FILENAME
			break;
	}
	if($_GET['category'] && strcmp($_GET['category'], "all") != 0) {
		$sql = $sql."where ca_name='".$_GET['category']."' ";
 	}
	if($_GET['category'] && $_GET['selTxt']) {
		$sql = $sql." and ";
	}
	if($_GET['selTxt']) {
		if(!$_GET['category']) {
			$sql = $sql." where ";
		}
		$sql = $sql."wr_subject like '%".$_GET['selTxt']."%' ";
	}
	$sql = $sql."order by wr_id desc ";
	$sql_page = $sql;
	$sql = $sql."limit ".$stIndex.", ".$maxPost;
	$db->query($sql);
	$result = $db->query($sql) or die($sql);
	
	$num_result = $result->num_rows;
	if($num_result <= 0) {
		echo "<dl><dt>게시물이 없습니다.</dt></dl>";
	} 
	else {
		for($i=0; $i<$num_result; $i++) {
			$titleImg = "";
			$row = $result->fetch_assoc();
			
			for($j = 0; $j < strlen($row['wr_content']) - 7; $j++){
				if(!strcmp(substr($row['wr_content'], $j, 7), "http://") ){
					for($k = $j; $k < strlen($row['wr_content']); $k++){
						if(!strcmp(substr($row['wr_content'], $k, 1), '"') ){
							
							break;
						}
						$titleImg = $titleImg.substr($row['wr_content'], $k, 1);
					}
				}
			}
			//echo str_replace(">", "]", str_replace("<", "[", $titleImg))."끝";
			//if($titleImg == "")
			echo "<dl>\n";
			echo "<dt><a href=\"./".$viewName."?wr_id=".$row['wr_id']."\">[".$row['ca_name']."] ".$row['wr_subject']."<span class=\"issueNum\">[".$row['wr_comment']."]</span></a></dt>";
			echo "<dd class=\"issueCont\"><a href=\"./".$viewName."?wr_id=".$row['wr_id']."\">".$row['wr_contents']."</a></dd>";
			echo "<dd class=\"issueDate\">".$row['wr_datetime']."</dd>";
			if($titleImg == "")
				echo "<figure><a href=\"./".$viewName."?wr_id=".$row['wr_id']."\">대표 이미지가 없습니다.</a>";
			else
				echo "<figure><a href=\"./".$viewName."?wr_id=".$row['wr_id']."\"><img width=\"174\" height=\"114\" src=\"".$titleImg."\" alt=\"\" /></a>";
			echo "<figcaption>issue image</figcaption></figure>";
			echo "</dl>";
		}
	}
?>
