<?php
session_start();
header("Content-type: text/html; charset=utf-8");
if (isset($_SESSION['asys'])) {
	unset($_SESSION['asys']);
}
?>
<script language='javascript'>
window.onload = win_load;
function win_load(){
	top.location.href = 'index.php';
};
</script>