<?php
if ($_FILES["$field"]["size"] > 0) {//如果文件大於0
	if ($_FILES["$field"]["error"] > 0) {			// 如果商船文件存在錯誤
		echo "<script>alert('".$_FILES["$field"]["error"]."');</script>\n";
		exit ;
	}else{
		$file_post_str = $_FILES["$field"];
		$file_name = time().'_'.$id . substr($file_post_str['name'], strpos($file_post_str['name'], '.'));	// 上傳檔名改成資料表 [時間_][序號] 加上原副檔名

		if (move_uploaded_file($_FILES["$field"]["tmp_name"], $dir."/".$file_name)) {	// 拷貝上傳檔到指定路徑
			$oldumask = umask(0) ;
			chmod($dir."/".$file_name, 0777);
			umask( $oldumask ) ;
			
			$exec = "update `".$tb."` set ";		// [上傳檔名] 存入資料庫
			$exec .= "`".$field."`='".$file_name."'";
			$exec .= " where `".$key."`='".$id."'";
			require "../fun/exec.php";
		}else {
			echo "<script>alert('檔案上傳失敗');</script>\n";
			exit ;
		}
	}
}
?>