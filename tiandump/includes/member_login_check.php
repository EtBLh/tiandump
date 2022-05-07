<?php
if (isset($_SESSION['usys']) && ! empty($_SESSION['usys']['memberid'])) :
	header("Location: member.php");
	exit();
endif;
?>