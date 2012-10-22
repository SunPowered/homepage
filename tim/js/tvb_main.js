var menu;
	window.onload = function(){
		menu = document.getElementById('menu');
		lis = menu.getElementsByTagName('li');
		for (i=0; i<lis.length; i++){
			lis[i].onmouseover = liMenuMouseOverHandler;
		}
	};
	
	function list_id_to_content(li_id) {
		return li_id.replace('li', 'content');
		
	}
	function hide_all_menus() {
		dc = document.getElementById('dynamic_content');
		lis = dc.getElementsByClassName('collapsed');
		for (i=0; i<lis.length; i++) {
			lis[i].style.display = 'none';
		}
	}
	function liMenuMouseOverHandler(e) {
		hide_all_menus();
		var contentId = list_id_to_content(this.id);
		document.getElementById(contentId).style.display = 'block';
	}