jQuery(document).ready(function() {
	var stickyNavTop = jQuery('.nav').offset().top;
	 
	var stickyNav = function(){
		var scrollTop = jQuery(window).scrollTop();
		var logoLarge = jQuery('.site-logo').find('a').first();
		var logoSmall = jQuery('.site-logo').find('a').last();
	        var verticalSpace = jQuery('.vertical-space');
	      
		if (scrollTop > stickyNavTop) { 
		    jQuery('.nav').addClass('sticky');
		    logoLarge.hide();
		    logoSmall.show();
                    verticalSpace.hide();
		} else {
		    jQuery('.nav').removeClass('sticky');
		    logoLarge.show();
		    logoSmall.hide(); 
                    verticalSpace.show();
		}
	};
	 
	stickyNav();
	 
	jQuery(document).on('scroll', function() {
	    stickyNav();
	});

	// toggle nav menu on mobile
	jQuery('.mobile-menu').on('click', function() {
		jQuery(this).toggleClass( "open" );
		jQuery('.navigation').slideToggle();
	});

	// toggle submenu
	jQuery('.menu-item-has-children').on('click', function(event) {
		console.log("cliccato");
		//ßevent.preventDefault();
		jQuery(this).find('.sub-menu').slideToggle();
		jQuery(this).find('.mobile-toggle').toggleClass('open');
	});



});
