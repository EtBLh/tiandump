<?php
include ('../FCKeditor/fckeditor.php');
$oFCKeditor1 = new FCKeditor('FCKeditor');
$oFCKeditor1->BasePath='../FCKeditor/'; 
$oFCKeditor1->ToolbarSet='Default';
$oFCKeditor1->InstanceName=$ename;
$oFCKeditor1->Value=$evalue;
$oFCKeditor1->Width='100%';
$oFCKeditor1->Height='500';
$oFCKeditor1->Create();
?>
