<?php
header("Content-type: text/html; charset=utf-8");
if(! isset($_SESSION['usys']) || empty($_SESSION['usys']['memberid'])):
	header("Location: login.php ");
	exit();
endif;
?>