<div id="header_logo"><img src="images/logo.png" alt="天字號水餃-LOGO"></div>
<div id="header_member">
<ul>
<?php if(! empty($_SESSION['usys']['memberid'])){ ?>
<li><a href="javascript:logout_click();">會員登出</a></li>
<?php }else{ ?>
<li><a href="login.php">會員登入</a></li>
<?php } ?>
<li>│</li>
<li><a href="member.php">會員中心</a></li>
</ul>
</div><!--header_member end-->
<script language="javascript">
function logout_click(){
	if (! confirm('確定要登出嗎 ?')){return};
	window.open("includes/member_logout.php","pagetmp");
}
</script>