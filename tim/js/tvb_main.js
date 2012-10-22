
	
window.onload = function(){
	hide_all_content();
	var content = get_content();
	var menu = document.getElementsByClassName('menu')[0];
	lis = menu.children;
	for (i=0; i<lis.length; i++){
		lis[i].onmouseover = liMenuMouseOverHandler;
	}
	
	menu.onmouseout = hide_all_content;
};

function get_content() {
	return document.getElementsByClassName('content')[0];
}
function list_id_to_content(li_id) {
	return li_id.replace('li', 'content');
	
}

function div_id_to_content(div_id) {
	return 'content_'+div_id;
}
function hide_all_content() {
	//content_div = document.getElementByClassName('content')[0];
	var content = get_content();
	elements = content.children;
	for (i=0; i<elements.length; i++) {
		elements[i].style.display = 'none';
	content.style.display = 'none';
	}
}
function liMenuMouseOverHandler(e) {
	hide_all_content();
	
	get_content().style.display = 'block';
	//alert(this.id);
	var contentId = list_id_to_content(this.id);
	document.getElementById(contentId).style.display = 'block';
}