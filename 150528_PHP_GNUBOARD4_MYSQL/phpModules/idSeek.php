<?php
	if(!$_POST['uname'] || !$_POST['uemail']) {
		echo "<script> alert('모든 항목을 입력해주세요.') </script>";
		echo "<script> history.back(); </script>";
		exit;
	}
	include_once("../phpModules/newDbConn.php");
	$userName = trim(strip_tags(addslashes($_POST["uname"])));
	$userEmail = trim(strip_tags(addslashes($_POST["uemail"])));
	$sql = "select UserID from User where UserName='".$userName."' and UserEmail='".$userEmail."'";
	$result = $db->query($sql) or die($sql);
	$resultNum = $result->num_rows;
	
	if($resultNum <= 0) {
		echo "<script> alert('해당 정보가 없습니다.') </script>";
		echo "<script> history.back(); </script>";
		exit;
	}
	else {
		$row = $result->fetch_assoc();
		echo "<script> alert('가입 하신 계정명은 ".$row['UserID']." 입니다.') </script>";
		echo "<script> history.back(); </script>";
	}
	$db->close();
?>
