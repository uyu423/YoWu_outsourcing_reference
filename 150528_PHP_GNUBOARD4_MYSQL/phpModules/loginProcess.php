<?php
//	echo $_POST['agreeChk'];
	if(!strcmp($_POST['agreeChk'], "no")){
		echo "<script>alert('약관에 동의 해 주세요.');</script>";
		echo "<script>history.go(-1);</script>";
		exit;
	}
	if($_POST["uid"] == null || $_POST["upass"] == null || $_POST['email'] == null || $_POST['uname'] == null || 
	$_POST['telSel'] == null || $_POST['tel2'] == null || $_POST['tel3'] == null || $_POST['hpSel'] == null || 
	$_POST["hp2"] == null || $_POST['hp3'] == null || $_POST['postNum'] == null || $_POST['postNum2'] == null || 
	$_POST['addrText'] == null || $_POST['addrText2'] == null ) {
		echo "<script>alert('항목을 모두 입력해주세요.');</script>";
		echo "<script>history.go(-1);</script>";
		exit;			
	}
	$passwd = trim(strip_tags(addslashes($_POST["upass"])));
	if(strcmp($passwd, $_POST['upassTwo'])){
		echo "<script>alert('비밀번호가 다릅니다.');</script>";
		echo "<script>history.go(-1);</script>";
		exit;
	}
	if(!strstr($_POST['email'], '@')){
		echo "<script>alert('이메일 형식을 확인해주세요.');</script>";
		echo "<script>history.go(-1);</script>";
		exit;		
	}
	include_once("../phpModules/newDbConn.php");
	$id = trim(strip_tags(addslashes($_POST["uid"])));
	$email = trim(strip_tags(addslashes($_POST["email"])));
	$name = trim(strip_tags(addslashes($_POST["uname"])));
	$tel = trim(strip_tags(addslashes($_POST["telSel"]."-".$_POST["tel2"]."-".$_POST["tel3"])));
	$phone = trim(strip_tags(addslashes($_POST["hpSel"]."-".$_POST["hp2"]."-".$_POST["hp3"])));
	$post = trim(strip_tags(addslashes($_POST["postNum"]."-".$_POST["postNum2"])));
	$addr1 = strip_tags(addslashes($_POST['addrText']));
	$addr2 = strip_tags(addslashes($_POST['addrText2']));
	
	$query = "insert into User values('".$id."', sha('".$passwd."'), '".$name."', '".$email."', '".$tel."', '".$phone."', '".$post."', '".$addr1."', '".$addr2."')";
	
	$result = $db->query($query) or die($query);
	if($result){
		echo "<script>alert('회원 가입이 완료 되었습니다.');</script>";
		echo "<script>location.href=\"../index.html\";</script>";
		die();
	} else{
		echo "<script>alert('회원가입 실패. 관리자에게 문의해주세요.');</script>";
		echo "<script>history.go(-1);</script>";
		die();
	}
	$db->close();
?>
