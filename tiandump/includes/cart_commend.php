<?php
session_start();
header("Content-type: text/html; charset=utf-8");

//=========安全檢查=========================
require_once '../fun/safe_check.php';

require_once '../fun/var.php';
require_once '../fun/database.inc.php';

/*
if(empty($_SESSION['usys']['memberid'])){
	echo "<script>alert(\"Login first.\")</script>;\n";
	exit;
}
*/
if ($mode == 'setcart'){

	$cart_count = count($_SESSION['usys']['cart']);
	$inflag = 0;
	for ($i=0; $i<$cart_count; $i++){
		if ($_SESSION['usys']['cart'][$i][0] == $pd){
			$sn = $i;
			$inflag = 1;
			break;
		}
	}
	if ($inflag == 0 && $qty >0) {//不存在且数量不为0,添加一條記錄
		$_SESSION['usys']['cart'][] = array($pd,$qty,$pkg);
	}elseif($inflag == 1){//存在
		if($qty == 0){//如果数量为0，则删除
			array_splice($_SESSION['usys']['cart'], $sn, 1);
		}else{//否则更新数量
			$_SESSION['usys']['cart'][$sn][1] = $qty;

		}
	}

}elseif ($mode == 'setpackage'){//更新包裝
	$cart_count = count($_SESSION['usys']['cart']);
	for ($i=0; $i<$cart_count; $i++){
		if ($_SESSION['usys']['cart'][$i][0] == $pd){
			$_SESSION['usys']['cart'][$i][2] = $pkg;
			break;
		}
	}
	
}elseif ($mode == 'setpayway'){//設置付款方式
	$_SESSION['usys']['payway'] = $payway;
}elseif ($mode == 'gocheckout'){//提交訂單
	if(count($_SESSION['usys']['cart']) == 0){
		echo "<script> alert(\"購物籃中沒有選購商品！\"); </script>\n";
		exit;
	}
	if(! isset($_SESSION['usys']['payway']) || empty($_SESSION['usys']['payway'])){
		echo "<script> alert(\"請選擇付款方式！\"); </script>\n";
		exit;
	}
	if(empty($_SESSION['usys']['memberid'])){
		echo "<script>parent.location.href='../login.php?go=shopping';</script>\n";
	}else{
		echo "<script>parent.location.href='../order2.php';</script>\n";
	}
}
?>
