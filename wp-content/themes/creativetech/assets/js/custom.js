jQuery(document).ready(function () {

  jQuery('.menu-toggle').click(function () {
    jQuery('#primary-menu').slideToggle()
})

if (jQuery( "nav" ).hasClass('toggled')) {
	jQuery( "body" ).addClass( 'className');
} else {
  jQuery( "#foo" ).removeClass( 'className');
}

if (jQuery("#site-navigation").hasClass("toggled")) {
    alert("Hello World");
}

   /* Back to top Button */
  
   jQuery(function(){

    //Scroll event
    jQuery(window).scroll(function(){
      var scrolled = jQuery(window).scrollTop();
      if (scrolled > 200) jQuery('.go-top').fadeIn('slow');
      if (scrolled < 200) jQuery('.go-top').fadeOut('slow');
    });
    
    //Click event
    jQuery('.go-top').click(function () {
      jQuery("html, body").animate({ scrollTop: "0" },  500);
    });
  
  });
   // Aub Menu Toggle
   jQuery('.submenu-toggle').click(function () {
    jQuery(this).toggleClass('button-toggle-active');
    var currentClass = jQuery(this).attr('data-toggle-target');
    jQuery(currentClass).toggleClass('submenu-toggle-active');
});

  /* Animation On Scroll */
  jQuery(document).ready(function () {
    //window and animation items
    var animation_elements = jQuery.find(".animation-element");
    var web_window = jQuery(window);

    //check to see if any animation containers are currently in view
    function check_if_in_view() {
      //get current window information
      var window_height = web_window.height();
      var window_top_position = web_window.scrollTop();
      var window_bottom_position = window_top_position + window_height;

      //iterate through elements to see if its in view
      jQuery.each(animation_elements, function () {
        //get the element sinformation
        var element = jQuery(this);
        var element_height = jQuery(element).outerHeight();
        var element_top_position = jQuery(element).offset().top;
        var element_bottom_position = element_top_position + element_height;

        //check to see if this current container is visible (its viewable if it exists between the viewable space of the viewport)
        if (
          element_bottom_position >= window_top_position &&
          element_top_position <= window_bottom_position
        ) {
          element.addClass("in-view");
        }
      });
    }

    //on or scroll, detect elements in view
    jQuery(window).on("scroll resize", function () {
      check_if_in_view();
    });
    //trigger our scroll event on initial load
    jQuery(window).trigger("scroll");
  });

 
  var showHeaderAt = 150;

  var win = jQuery(window),
    body = jQuery("body");

  // Show the fixed header only on larger screen devices

  if (win.width() > 400) {
    // When we scroll more than 150px down, we set the
    // "fixed" class on the body element.

    win.on("scroll", function (e) {
      if (win.scrollTop() > showHeaderAt) {
        body.addClass("fixed");
      } else {
        body.removeClass("fixed");
      }
    });
  }

 

});