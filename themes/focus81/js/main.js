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


/**
 * Android stock browser fix for dropdowns.
 * See: http://getbootstrap.com/getting-started/#support-android-stock-browser
 */
$(function () {
	var nua = navigator.userAgent
	var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
	if (isAndroid) {
		$('select.form-control').removeClass('form-control').css('width', '100%')
	}
});


// Mobile menu solution scripts
var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
    showLeft = document.getElementById( 'showLeft' ),
    content = document.getElementById( 'closer' ),
    body = document.body;

showLeft.onclick = function() {
    classie.toggle( this, 'active' );
    classie.toggle( menuLeft, 'cbp-spmenu-open' );
    //disableOther( 'showLeft' );
};

content.onclick = function(){
            classie.toggle( showLeft, 'active' );
            classie.toggle( menuLeft, 'cbp-spmenu-open' );
};