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
		if (ts1.indexOf('#') != -1){//除去字符串#
			ts1 = ts1.replace('#', '');
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
	
	function view_change(x,pagecount){//換每頁察看數量函數
		var ts1 = window.location.href;
		var ts2 = '?';
		if (ts1.indexOf('?') != -1){ts2 = '&'};
		
		if (ts1.indexOf('#top') != -1){//除去字符串#top
			ts1 = ts1.replace('#top', '');
		};
		if (ts1.indexOf('#') != -1){//除去字符串#
			ts1 = ts1.replace('#', '');
		};
		if (ts1.indexOf('pagecount') != -1){
			ts1 = ts1.replace('pagecount=' + pagecount, 'pagecount='+x);
		}else{
			ts1 += ts2 + 'pagecount=' + x;
		};
		window.open(ts1, '_self');
	};
/*以上是分頁函數*/