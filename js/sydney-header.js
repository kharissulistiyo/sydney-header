;(function($) {

   'use strict'


   	var responsiveMenu = function() {
   		var	menuType = 'desktop';

   		$(window).on('load resize', function() {
   			var currMenuType = 'desktop';

   			if ( matchMedia( 'only screen and (max-width: 9999999px)' ).matches ) {
   				currMenuType = 'mobile';
   			}

   			if ( currMenuType !== menuType ) {
   				menuType = currMenuType;

   				if ( currMenuType === 'mobile' ) {
   					var $mobileMenu = $('#mainnav2').attr('id', 'mainnav-mobi').hide();
   					var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');

   					$('#header').find('.header-wrap').after($mobileMenu);
   					hasChildMenu.children('ul').hide();
   					var svgSubmenu = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"/></svg>';
   					hasChildMenu.children('a').after('<span class="btn-submenu">' + svgSubmenu + '</span>');
   					$('.btn-menu2').removeClass('active');
   				} else {
   					var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav-mobi').removeAttr('style');

   					$desktopMenu.find('.submenu').removeAttr('style');
   					$('#header').find('.col-md-10').append($desktopMenu);
   					$('.btn-submenu').remove();
   				}
   			}
   		});

   		$('.btn-menu2').on('click', function() {
   			$('#mainnav-mobi').slideToggle(300);
   			$(this).toggleClass('active');
   		});

   		$(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
   			$(this).toggleClass('active').next('ul').slideToggle(300);
   			e.stopImmediatePropagation()
   		});
   	}


   $(function() {
     responsiveMenu();
   });

})(jQuery);
