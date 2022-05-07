<?php
if (! mysql_query($exec)) {
	echo $exec;
	// exit("<script>alert(\"$exec\");</script>");
	exit("<script>alert(\"Error:2001: can not exec SQL \");</script>");
	exit ();
}
?>
