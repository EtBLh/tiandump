<?php
session_start();
if (! isset($_SESSION['asys'])) {
	echo "<script>top.location='./'</script>";
//	header("location: index.php");
	exit();
}
//=================����ύ���������ͮ�ǰ����������һ�£��t�����S����==========================
//ʹ��js��window.open�o���@ȡ��HTTP_REFERER ������ͬһ������Ҳ����ʾ�e�`
if(isset($_SERVER["HTTP_REFERER"])){
	if($_SERVER["HTTP_REFERER"] != ""){//��տ�����ͨ�^js��window.open��ֵ�������ϵ�y�����js��ֵ������ֹ�����Ժ����@һ��r
		$server_name =$_SERVER['HTTP_HOST']; //�@ȡ��վ����
		$server_len = strlen($server_name); //Ӌ�㱾վ�����L��

		$sub_from = $_SERVER["HTTP_REFERER"]; //�@ȡ��Դ��referer
		$sub_from = str_replace("http://","",$sub_from);
		$sub_from = str_replace("https://","",$sub_from);
		$sub_from = substr($sub_from,0,$server_len); //��ȡ��Դ����
		if($sub_from != $server_name){ //��������,�t�Kֹ
			echo "<script>alert('�Ƿ��������e�`�Ĕ�����Դ��');</script>\n";
		    exit;
		}
	}
}
require_once "../fun/var.php";
?>