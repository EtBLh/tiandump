$(function(){

	
	$('.idx-products-box:nth-child(3n)').css({marginRight:0});
	//$('.idx-products-box:nth-child(3n+1)').css({float:'left',clear:'left'});

	

	var $banner = $('#banner'),

			$ul = $banner.find('ul'),

			_liHtml = $ul.html(),

			_width = $banner.width(),

			_animateSpeed = 500,

			_speed = 5000,

			timer,

			_index = 0,

			isHover = false;

	

	$ul.html( _liHtml + _liHtml)

	var $li = $ul.find('li');

	

	$li.hover(

		function(){

			isHover = true;

			clearTimeout(timer);

		},

		function(){

			isHover = false;

			timer = setTimeout(move,_speed);

		}

	);

	

	function move(){	

		_index = _index + 1 % $li.length; 

		$ul.animate({

			left: _index * _width * -1

		},_animateSpeed,function(){

			if( _index >= $li.length / 2 ){

				$ul.css ({left:0});

				_index = 0;

			}

			if( !isHover){

				timer = setTimeout(move,_speed);

			}

		});

	};



	timer = setTimeout(move,_speed);

	

	$('.idx-products-box,.idx-infor-box').hover(

		function(){$(this).find('img').stop().animate({opacity:.5});},

		function(){$(this).find('img').stop().animate({opacity:1});}

	);

	

	$('#info_news_table tr:odd').css({backgroundColor:'#FFF'});

	

	$(window).scroll(function () {

		if ($(this).scrollTop() > 250) {

			$('#top_btn').fadeIn();

		} else {

			$('#top_btn').fadeOut();

		}

	});

	

});





$(window).load(function() {



}); 









//圓角

$("#back").corner("round right 5px");

$(".co").corner("round right 5px");





//input

//function clearDefault(t) { 

//	if (t.value == t.defaultValue) t.value = "";

//} 

//function recallDefault(t) { 

//	if (t.value == "") t.value = t.defaultValue; 

//}

// 

//function clearDefaultPass(t) { 

//	if (t.value == t.defaultValue) {

//		t.style.display = "none";

//		t.nextSibling.style.display = "";

//		t.nextSibling.focus();

//	}

//} 

//function recallDefaultPass(t) { 

//	if (t.value == "") {

//		t.style.display = "none";

//		t.previousSibling.style.display = "";

//	}	 

//}





