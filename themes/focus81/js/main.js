$(function () {
	
	// give first/last hooks to main navigation elements
	var $nav = $('#main-nav');
	$nav.find('li:first').addClass('first');
	$nav.find('li:last-child').not('ul li ul li').addClass('last');

	// initialize superfish nav bar with drop downs
	$nav.superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast',
		autoArrows:  false,
		dropShadows: false
	});

});