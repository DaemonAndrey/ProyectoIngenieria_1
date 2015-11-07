$(document).ready(function(){
	$('table tr.sub').hide();
	$(".cat").click(function(){
		$(this).nextUntil('tr.cat').toggle(500);
	});
	//$(this).find('span').text(function(_, value){return value=='-'?'+':'-'});
});
