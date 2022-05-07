<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";



$exec = "update `sys_smtp` set ";
$exec .= "`send_name`='".$send_name."',";
$exec .= "`send_email`='".$send_email."',";
$exec .= "`receive_name`='".$receive_name."',";
$exec .= "`receive_email`='".$receive_email."',";
$exec .= "`smtp_hosting`='".$smtp_hosting."',";
$exec .= "`smtp_port`='".$smtp_port."',";
$exec .= "`smtp_check`='".$smtp_check."',";
$exec .= "`smtp_user`='".$smtp_user."',";
$exec .= "`smtp_password`='".$smtp_password."',";
$exec .= "`smtp_secure`='".$smtp_secure."'";
$exec .= " where `lang`='".$_SESSION['asys']['lang']."'";
require "../fun/exec.php";



echo "<script>alert('存檔成功!');</script>\n";

?>
