	function sameinfo(){
		if(document.getElementById("same").checked == true){
			document.getElementById("r_name").value = document.getElementById("name").value;
			document.getElementById("r_sex").value = document.getElementById("sex").value;
			document.getElementById("r_phone").value = document.getElementById("phone").value;
			document.getElementById("r_address_zip").value = document.getElementById("address_zip").value;
			document.getElementById("r_address").value = document.getElementById("address").value;
			AddressInit("r_address_city","r_address_area","r_address_zip",document.getElementById("address_city").value,document.getElementById("address_area").value) ;
		}
		else
		{
			document.getElementById("r_name").value = "";
			document.getElementById("r_sex").value = "";
			document.getElementById("r_phone").value = "";
			document.getElementById("r_address_zip").value = "";
			document.getElementById("r_address").value = "";
			AddressInit("r_address_city","r_address_area","r_address_zip","","") ;
	    }
	}
	function go_check(cart_count,payway){
		if(cart_count == 0){
			alert("購物車中沒有商品！");
			return;
		}
		if(payway == ''){
			alert("請選擇結帳方式！");
			return;
		}
		
		
		if(document.getElementById("name").value == ""){
			alert("請輸入購買人姓名");
			return;
		}
		if(document.getElementById("phone").value == ""){
			alert("請輸入購買人手機號碼");
			return;
		}
		if (isNaN(document.getElementById("phone").value) || document.getElementById("phone").value <= 0){
			alert('購買人手機號碼請輸入數字');
			return;
		}
		if(document.getElementById("address_city").value == "" || document.getElementById("address_city").value == ""){
			alert("請選擇購買人縣市");
			return;
		}
		if(document.getElementById("address").value == ""){
			alert("請輸入收件人地址");
			return;
		}
		
		if(document.getElementById("r_name").value == ""){
			alert("請輸入收件人姓名");
			return;
		}
		if(document.getElementById("r_phone").value == ""){
			alert("請輸入收件人手機號碼");
			return;
		}
		if (isNaN(document.getElementById("r_phone").value) || document.getElementById("r_phone").value <= 0){
			alert('收件人手機號碼請輸入數字');
			return;
		}
		if(document.getElementById("r_address_city").value == "" || document.getElementById("r_address_city").value == ""){
			alert("請選擇收件人縣市");
			return;
		}
		if(document.getElementById("r_address").value == ""){
			alert("請輸入收件人地址");
			return;
		}
		
		var selobj1=document.getElementById("button_div");
		var selobj2=document.getElementById("submit_div");
		selobj1.style.display="none";
		selobj2.style.display="block";
		document.go_check_form.submit();
	}
