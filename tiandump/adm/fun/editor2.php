<?php
include ('../FCKeditor/fckeditor.php');
$oFCKeditor2 = new FCKeditor('FCKeditor');
$oFCKeditor2->BasePath='../FCKeditor/';
$oFCKeditor2->ToolbarSet='Default';
$oFCKeditor2->InstanceName=$ename;
$oFCKeditor2->Value=$evalue;
$oFCKeditor2->Width='100%';
$oFCKeditor2->Height='500';
$oFCKeditor2->Create();
?>
