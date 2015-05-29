<?php
	error_reporting(0);
	if(!$_POST['uid'] || !$_POST['uemail']) {
		echo "<script> alert('모든 항목을 입력해주세요.') </script>";
		echo "<script> history.back(); </script>";
		exit;
	}
	function sendMail($EMAIL, $NAME, $mailto, $SUBJECT, $CONTENT){
		  //$EMAIL : 답장받을 메일주소
		  //$NAME : 보낸이
		  //$mailto : 보낼 메일주소
		  //$SUBJECT : 메일 제목
		  //$CONTENT : 메일 내용
		  $admin_email = $EMAIL;
		  $admin_name = $NAME;

		  $header = "Return-Path: ".$admin_email."\n";
		  $header .= "From: =?EUC-KR?B?".base64_encode($admin_name)."?= <".$admin_email.">\n";
		  $header .= "MIME-Version: 1.0\n";
		  $header .= "X-Priority: 3\n";
		  $header .= "X-MSMail-Priority: Normal\n";
		  $header .= "X-Mailer: FormMailer\n";
		  $header .= "Content-Transfer-Encoding: base64\n";
		  $header .= "Content-Type: text/html;\n \tcharset=euc-kr\n";
		  
		  $subject = "=?EUC-KR?B?".base64_encode($SUBJECT)."?=\n";
		  $contents = $CONTENT;

		  $message = base64_encode($contents);
		  flush();
		  return mail($mailto, $subject, $message, $header);
	}
	
	include_once("../phpModules/newDbConn.php");
	$userId = trim(strip_tags(addslashes($_POST["uid"])));
	$userEmail = trim(strip_tags(addslashes($_POST["uemail"])));
	$sql = "select UserID, UserEmail, UserPW from User where UserId='".$userId."' and UserEmail='".$userEmail."'";
	$result = $db->query($sql) or die($sql);
	$resultNum = $result->num_rows;
	
	if($resultNum <= 0) {
		echo "<script> alert('해당 정보가 없습니다.') </script>";
		echo "<script> history.back(); </script>";
		exit;
	}
	$row = $result->fetch_assoc();
	sendMail("DoNotReply@onlineif.com", "문화미래IF", $row, $row['UserID']."님의 계정 비밀번호를 발송해드립니다.", $row['UserID']."님의 계정 비밀번호는 ".$row['UserPW']." 입니다.");
	$db->close();
	echo "<script> alert('등록하신 메일로 발송되었습니다.') </script>";
	echo "<script> history.back(); </script>";
?>
