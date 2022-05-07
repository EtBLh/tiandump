<?php
include ('../FCKeditor/fckeditor.php');
$oFCKeditor = new FCKeditor('FCKeditor');
$oFCKeditor->BasePath='../FCKeditor/';
$oFCKeditor->ToolbarSet='Default';
$oFCKeditor->InstanceName=$ename;
$oFCKeditor->Value=$evalue;
$oFCKeditor->Width='100%';
$oFCKeditor->Height='500';
$oFCKeditor->Create();
?>
