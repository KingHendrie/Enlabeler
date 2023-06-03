$(document).ready(function() {
	const theBody = $('body');
	const openNav = $('.menu-bar button');
	const closeNav = $('.close-nav button');
	const Navbar = $('.navbar');
 
	function bodyScroll() {
	  	if (Navbar.hasClass('show')) {
			theBody.addClass('hide-scroll');
	  	} else if (theBody.hasClass('hide-scroll')) {
		 	theBody.removeClass('hide-scroll');
	  	}
	}
 
	function showHide() {
	  	Navbar.toggleClass('show');
	  	bodyScroll();
	}
 
	openNav.on('click', showHide);
	closeNav.on('click', showHide);
});