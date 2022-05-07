<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";
include("member.inc.php");


if ($mode == 'add'){


}elseif ($mode == 'del'){

	$ta1 = explode(',', $ids);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		
		$exec = "delete from `".$tb."` where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('刪除完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}elseif ($mode == 'edit'){
	$byear = strtotime($byear);
	$addingdate = strtotime($addingdate);
	$exec = "update `member` set ";
	$exec .= "`logid`='".$logid."',";
	$exec .= "`password`='".$password."',";
	$exec .= "`name`='".$name."',";
	$exec .= "`sex`='".$sex."',";
	$exec .= "`byear`='".$byear."',";
	$exec .= "`tel`='".$tel."',";
	$exec .= "`cellphone`='".$cellphone."',";
	$exec .= "`member_email`='".$member_email."',";
	$exec .= "`address_city`='".$address_city."',";
	$exec .= "`address_area`='".$address_area."',";
	$exec .= "`address_zip`='".$address_zip."',";
	$exec .= "`address`='".$address."',";
	$exec .= "`addingdate`='".$addingdate."',";
	$exec .= "`isopen`='".$isopen."'";
	$exec .= " where `memberid`='".$id."'";
	require "../fun/exec.php";


	echo "<script>alert('存檔完畢');</script>\n";

}

?>
