
/*For Mobile Sub Menu */
(function ($) {
	function setup_collapsible_submenus() {
		// mobile menu
		$('.et_mobile_nav_menu .menu-item-has-children > a').after('<span class="menu-closed"></span>');
		$('.et_mobile_nav_menu .menu-item-has-children > a').each(function () {
			$(this).next().next('.sub-menu').toggleClass('hide', 1000);
		});
		$('.et_mobile_nav_menu .menu-item-has-children > a + span').on('click', function (event) {
			event.preventDefault();
			$(this).toggleClass('menu-open');
			$(this).next('.sub-menu').toggleClass('hide', 1000);
		});
	}
	$(window).load(function () {
		setTimeout(function () {
			setup_collapsible_submenus();
		}, 700);
	});
})(jQuery);

/*Client logo Crosual*/
jQuery(document).ready(function(){
    jQuery("#dct_client").owlCarousel({
        items:6,
        itemsDesktop:[1000,6],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,2],
        pagination:false,
        navigation:true,
		nav:true,
		autoplay: true,
		autoplayTimeout: 5000,
		rewind: false,
		navigationText:["",""]
	});

});

/*Theme Options Js*/
jQuery(function($){$('.cl-toggler').on('click',function(event){
	event.preventDefault();
	$(this).parent().parent().toggleClass('opened');});
	var presets=$('.cl-presets').find('li');
	presets.each(function(){
		$(this).find('a').on('click',function(event){
			event.preventDefault();
			var currentColor1 = $(this).find('div.color1').css("background-color");
			var currentColor2 = $(this).find('div.color2').css("background-color");
			$('#lblColorCode1').text(rgba2hex(currentColor1));
			$('#lblColorCode2').text(rgba2hex(currentColor2));
			document.documentElement.style.setProperty("--color-1", currentColor1);
			document.documentElement.style.setProperty("--color-2", currentColor2);
			presets.removeClass('active');
			$(this).parent().addClass('active');
		});
  });
  $('#switcher-menu-primary-color li a').on('click',function(event){
		event.preventDefault();
		var primaryColor = $(this).css("background-color");
		$('#lblColorCode1').text(rgba2hex(primaryColor));
		document.documentElement.style.setProperty("--color-1", primaryColor);
  });
  $('#switcher-menu-secondary-color li a').on('click',function(event){
		event.preventDefault();
		var secondaryColor = $(this).css("background-color");
		$('#lblColorCode2').text(rgba2hex(secondaryColor));
		document.documentElement.style.setProperty("--color-2", secondaryColor);
  });	

$('#cl-boxed').on('change',function(){
	if($(this).is(':checked')){
		$('body').addClass('layout-boxed');
		}
		else{
			$('body').removeClass('layout-boxed').removeAttr('style');
			}
	});

});

function rgba2hex( color_value ) {
	if ( ! color_value ) return false;
	var parts = color_value.toLowerCase().match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/),
		length = color_value.indexOf('rgba') ? 3 : 2; // Fix for alpha values
	delete(parts[0]);
	for ( var i = 1; i <= length; i++ ) {
		parts[i] = parseInt( parts[i] ).toString(16);
		if ( parts[i].length === 1 ) parts[i] = '0' + parts[i];
	}
	return '#' + parts.join('').toUpperCase(); // #F7F7F7
}