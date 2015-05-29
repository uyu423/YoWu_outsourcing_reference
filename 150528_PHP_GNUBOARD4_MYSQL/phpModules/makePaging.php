<?php 
	include_once("../phpModules/newDbConn.php");
	
	$result = $db->query($sql_page) or die($sql_page);
	$cnt = $result->num_rows;
	$maxPage = ceil($cnt / $maxPost);
	$nowBigPage = (int)(($page - 1)/5 + 1);
	$stPage = $nowBigPage * 5 - 4;
	$edPage = $nowBigPage * 5; 
	
	/* variable debuging */ /*
	echo "cnt = ".$cnt."\n";
	echo "nowPage = ".$page."\n";
	echo "maxPage = ".$maxPage."\n";
	echo "nowBigPage = ".$nowBigPage."\n";
	echo "stPage = ".$stPage."\n";
	echo "edPage = ".$edPage."\n"; */

	echo "<div class=\"paging\">";
	if($nowBigPage != 1) {
		echo "<a href='".$fileName."?page=".($stPage - 1)."'><span class=\"num\"><</span></a>\n";
	}	// '<' ICON DEFINE
	for($i=$stPage; $i<=$edPage; $i++) {
		if($i > $maxPage) break;
		if($i == $page) {
			echo "<span class=\"nowNum\">".$i."</span>\n";
			continue;
		}
		echo "<a href=\"".$fileName."?page=".$i."\"><span class=\"num\">".$i."</span></a>\n";
	}	// FIVE PAGE ICON GENERATOR
	if(!($i > $maxPage)) {
		echo "<a href='".$fileName."?page=".($edPage + 1)."'><span class=\"num\">></span></a>\n";
	}	// '>' ICON DEFINE
	echo "</div>";
?>
