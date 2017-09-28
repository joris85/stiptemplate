// javascript version 3.0  last update 28-09-2017 -->

jQuery(function($) {
	// Turn radios into btn-group
	$('fieldset.radio').addClass('btn-group');
	$('.radio.btn-group label').addClass('btn');
	$(".btn-group label:not(.active)").click(function() {
		var label = $(this);
		var input = $('#' + label.attr('for'));

		if (!input.prop('checked')) {
			label.closest('.btn-group').find("label").removeClass('active btn-success btn-danger btn-primary');
			if (input.val() == '' || input.val() == '-2') {
				label.addClass('active btn-primary');
			} else if (input.val() == 0) {
				label.addClass('active btn-danger');
			} else {
				label.addClass('active btn-success');
			}
			input.prop('checked', true);
		}
	});
	$(".btn-group input[checked=checked]").each(function() {
		if ($(this).val() == '' || $(this).val() == '-2') {
			$("label[for=" + $(this).attr('id') + "]").addClass('active btn-primary');
		} else if ($(this).val() == 0) {
			$("label[for=" + $(this).attr('id') + "]").addClass('active btn-danger');
		} else {
			$("label[for=" + $(this).attr('id') + "]").addClass('active btn-success');
		}
	});

	var toppostion = $('#top').position().top;
	
	$(window).scroll(function() {
		if ($(document).scrollTop() > toppostion) {
			$('.backtotop').fadeIn();
		}
		if ($(document).scrollTop() <= toppostion) {
			$('.backtotop').fadeOut();
		}
    });
    
	$('.scroll').on('click', function(event) {
		event.preventDefault();
		var target = "#" + $(this).data('target');
		$('html, body').animate({
			scrollTop: $(target).offset().top
		}, 800);
	});
});


/* Scroll fixed bar small class */
jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();
/* was 590 */
    if(scroll >= 100) {
        jQuery("#body").addClass("smallheader");
    } else {
        jQuery("#body").removeClass("smallheader");
    }
});



/*---- Submenu on tablet fix ----*/
function isTouchDevice(){
    return typeof window.ontouchstart !== 'undefined';
}
jQuery(document).ready(function($){
jQuery("li.parent  > a").removeAttr("data-target").removeAttr("data-toggle").removeClass("clicked");

    if(isTouchDevice()) {
        jQuery("li.parent  > a").click(function(event) {
			if(jQuery( document ).width() > 979)
			{
				jQuery("li.parent > a").not(this).removeClass("clicked");
				jQuery("li.parent > a").parents().removeClass("open");

				jQuery(this).toggleClass("clicked");
				if (jQuery(this).hasClass("clicked"))
				     {
					   event.preventDefault();
					    jQuery(this).parents().addClass("open");
					 }
			} 

        });

    }
});
/*---- EINDE Submenu on tablet fix ----*/


// Focus on input after click search //

jQuery(document).ready(function(){
jQuery('#sticksearch').click(function(){
    jQuery('.search-query.input-medium').focus();
});
});


jQuery(document).ready(function(){
jQuery('.search-content').click(function(){
    jQuery('.search-query.input-medium').focus();
});
});

jQuery(document).ready(function(){
jQuery('.searchbox').click(function(){
    jQuery('.search-query.input-medium').focus();
});
});

jQuery(document).ready(function(){
jQuery('#search').click(function(){
    jQuery('#mod-finder-searchword.search-query.input-medium').focus();
});
});
// ENd focus//

// Smooth scroll to anchor //
jQuery(document).ready(function(){
  // Add smooth scrolling to all links
  jQuery("a").on('click', function(event) {
     

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      // On click removeClass is closing menu
      jQuery('nav.mmenu, body').removeClass('mmenu--open');          
      jQuery('html, body').animate({
        scrollTop: jQuery(hash).offset().top
      }, 800, function(){
       
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;

      });
    } // End if

  });
});
// End smooth scroll//