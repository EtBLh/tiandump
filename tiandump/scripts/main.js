(function(){
	var s = document.getElementsByTagName("script");
	var d = 'scripts/';
	for(var i=0; i<arguments.length; i++){
		document.write('<script type="text/javascript" src="'+d+arguments[i]+'"></script>');
	}
})(
"jquery.backstretch.min.js"
);
