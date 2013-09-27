/*

Javascript
----------

Project:	Bryce Theme JavaScript
Date:		July 2013

*/

jQuery(function(){
	// mobile menu init
	// jQuery('#mobile_menu').click(function(){
	// 	jQuery(this).siblings('.menu').toggleClass('open');
	// 	jQuery(this).toggleClass('active');
	// 	return false;
	// });
	// give ability to close messages
	jQuery('.messages').append('<a href="#close" class="closer">x</a>');
	jQuery('.messages .closer').click(function(){
		jQuery(this).parent().slideUp(1000,function(){
			jQuery(this).remove();
		});
		return false;
	});
	// form enhancements
});