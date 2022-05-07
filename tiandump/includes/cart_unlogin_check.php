<?php
if(! isset($_SESSION['usys']) || empty($_SESSION['usys']['memberid'])):
	header("Location: login.php?go=shopping ");
	exit();
endif;
?>