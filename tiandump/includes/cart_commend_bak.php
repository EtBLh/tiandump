<?session_start();include('../fun/head2.inc');include('../fun/var.inc');include('../fun/database.inc');?>
<script language='javascript'>window.onload = win_load;function win_load(){
<?
$end = '};</script>';
if (! isset($_SESSION['cart'])) :	session_register('cart');	$_SESSION['cart'] = array();endif;
$cart_count = count($_SESSION['cart']);$inflag = 0;for ($i=0; $i<$cart_count; $i++) :	if ($_SESSION['cart'][$i][0] == $id) :		$sn = $i;		$inflag = 1;		break;	endif;endfor;if ($inflag == 0 && $qty >0) ://不存在且数量不为0	$_SESSION['cart'][] = array($id,$qty,$price);	$one_total = $qty * $price;	echo "parent.document.getElementById('one_total$id').innerHTML = '$one_total';\n";	elseif($inflag == 1)://存在	if($qty == 0)://如果数量为0，则删除		array_splice($_SESSION['cart'], $sn, 1);		echo "parent.document.getElementById('one_total$id').innerHTML = '';\n";	else://否则更新数量		$_SESSION['cart'][$sn][1] = $qty;		$one_total = $qty * $price;		echo "parent.document.getElementById('one_total$id').innerHTML = '$one_total';\n";	endif;endif;/*====统计总金额================*/
$cart_count = count($_SESSION['cart']);
$total = 0;
for ($i=0; $i<$cart_count; $i++) :
	$one_total = $_SESSION['cart'][$i][1] * $_SESSION['cart'][$i][2];
	$total += $one_total;
endfor;
echo "parent.document.getElementById('total').innerHTML = '$total';\n";
?>};</script>