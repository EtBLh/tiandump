//全選函數
function checkall_click(){
	var i;
	for (i=0; i<document.getElementsByName("c_box").length; i++){
		if (document.getElementsByName("c_box")[i].type != 'checkbox'){continue};
		if (document.getElementsByName("c_box")[i].name == 'box1'){continue};
		document.getElementsByName("c_box")[i].checked = document.getElementById("box1").checked;
	};
};
//排序函數
function sortsave_click(){
	var i,ts1=ts2=ts3='';
	for (i=0; i<document.getElementsByName("seq").length; i++){
		if (document.getElementsByName("seq")[i].type != 'text'){continue};
		ts3 = document.getElementsByName("seq")[i].name;
//		if (ts3.substr(0, 3) != 'seq'){continue};
		if (ts1 != ''){
			ts1 += ',';
			ts2 += ',';
		};
		ts1 += document.getElementsByName("seq")[i].id;
		ts2 += document.getElementsByName("seq")[i].value;
	};
	document.getElementById("ids").value = ts1;
	document.getElementById("vals").value = ts2;
	document.getElementById("mode").value = 'sortsave';
	document.form1.submit();
};
/*以下是分頁函數*/
	function upage(curpage,totalpages){//上一頁
		if (curpage == 0){
			alert('已經是第一頁');
			return;
		};
		pag_change(curpage-1,curpage,totalpages);
	};
	
	function dpage(curpage,totalpages){//下一頁
		if (totalpages == 0 || curpage == totalpages-1){
			alert('已經是最後一頁');
			return;
		};
		pag_change(curpage+1,curpage,totalpages);
	};
	
	function fpage(curpage,totalpages){//第一頁
		if (curpage == 0){
			alert('已經是第一頁');
			return;
		};
		pag_change(0,curpage,totalpages);
	};
	
	function lpage(curpage,totalpages){//最後一頁
		if (totalpages == 0 || curpage == totalpages-1){
			alert('已經是最後一頁');
			return;
		};
		pag_change(totalpages-1,curpage,totalpages);
	};
	
	function pag_change(x,curpage,totalpages){//換頁函數
		var ts1 = window.location.href;
		var ts2 = '?';
		if (ts1.indexOf('?') != -1){ts2 = '&'};
		
		if (ts1.indexOf('#top') != -1){//除去字符串#top
			ts1 = ts1.replace('#top', '');
		};

		if (ts1.indexOf('curpage') != -1){
			ts1 = ts1.replace('curpage='+curpage, 'curpage='+x);
		}else{
			ts1 += ts2 + 'curpage=' + x;
		};
		if (ts1.indexOf('totalpages') == -1){
			ts1 += '&totalpages=' + totalpages;
		};
		window.open(ts1, '_self');
	};
/*以上是分頁函數*/