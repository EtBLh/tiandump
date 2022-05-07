<?php
$dm1_sql = "select `".$field."` from `".$tb."` where `".$key."`='".$ta1[$i]."'";
require "../fun/dm1.php";
$ts1 = dm1($field, 0);
if ($ts1 != '' && file_exists("$dir/$ts1")) unlink("$dir/$ts1");
?>