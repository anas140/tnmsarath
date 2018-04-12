$( document ).ready(function() {

	var menu = $('#cssmenu');
	var menuList = menu.find('ul:first');
	var listItems = menu.find('li').not('#responsive-tab');


	menuList.prepend('<li id="responsive-tab"><a href="#0">MENU</a></li>');


	menu.on('click', '#responsive-tab', function(){
		//event.preventDefault();
		$(".header_block").toggleClass("is-visible");
		$("#cssmenu > ul").toggleClass("is-visible");
		listItems.slideToggle("fast");
		//listItems.toggleClass('collapsed');
		$('#cssmenu > ul >li').toggleClass('collapsed');
	});


	$('.has-sub > a').on('click', function(event) {
	    $(this).toggleClass("active");
		event.preventDefault();
		var target = $(this).attr('rel');
	   $("#"+target).slideToggle();
	});

	$('.sub-has-child > a').on('click', function(event) {
	    $(this).toggleClass("active");
		event.preventDefault();
		var target = $(this).attr('rel');
	   $("#"+target).slideToggle();
		$('sub-has-child > ul >li').toggleClass('collapsed');
	});
});