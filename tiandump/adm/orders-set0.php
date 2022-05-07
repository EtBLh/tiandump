<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";


$exec = "update `orders_set` set ";
$exec .= "`ship_total`='".$ship_total."',";
$exec .= "`ship_line_total`='".$ship_line_total."',";
$exec .= "`cod_total`='".$cod_total."',";
$exec .= "`cod_line_total`='".$cod_line_total."',";
$exec .= "`bank_name`='".$bank_name."',";
$exec .= "`bank_no`='".$bank_no."',";
$exec .= "`card_name`='".$card_name."',";
$exec .= "`card_no`='".$card_no."'";
$exec .= " where `lang`='".$_SESSION['asys']['lang']."'";
require "../fun/exec.php";



echo "<script>alert('存檔完畢');</script>\n";

?>
