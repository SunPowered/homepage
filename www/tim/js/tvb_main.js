function formhash(form, password) {
	var p = document.createElement('input');
	
	form.appendChild(p);
	
	p.name = 'p';
	p.type='hidden';
	p.value = hex_sha512(password.value);
	
	
	
	password.value = "";
	
	form.submit();
	
}
$(function() {
		
		$(".menu li").mouseenter(
				function(){
					var $this=$(this);
					//$('.content').stop(true).hide();
					
					
					$('.content').hide();
					$('#'+this.id.replace('li','content')).stop(true, true).slideDown(500, 'swing');
				}
				//function(){
				//	$('#'+this.id.replace('li','content')).stop(true, true).slideUp('fast');
				//}
				);
		//$('li.content').hide();
	});

// Login Screen
$(function () {
	$(document).on('click', 'a.dev_login', function () {
		
		//alert('login modal: ' + $login_model);
		$("#login").dialog({autoOpen : false, modal : true, show : "blind", hide : "blind"});

		$("#login").dialog('open');
	});
});