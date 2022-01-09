var category =document.getElementById('category');


category.onclick= function (e) {
	e.preventDefault();
	document.getElementById('category_sub').classList.toggle('display_click');
	
	document.getElementById('toggle_icon').classList.toggle('fa-chevron-right');
	document.getElementById('toggle_icon').classList.toggle('fa-chevron-down');
	
}




