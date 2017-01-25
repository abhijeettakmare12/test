$(function(){
	$('select').each(function(){
		var selVal=$(this).find('option:selected').html();
		$(this).wrap('<div class="selectwrp"></div>');
		$(this).after('<div class="selctxt">'+selVal+'</div>');
	});
	$('select').on('change keyup', function(){
		var selVal=$(this).find('option:selected').html();
		$(this).next('.selctxt').html(selVal);
	});
});