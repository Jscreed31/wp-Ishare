jQuery(document).ready(function() {
	console.log("ready !");
	
	if(main_vars.sharp_tian_img_autoplay === 'true'){
		var img_auto=true;		
	}else{
		var img_auto=false;
	}


	var img_autospeed = main_vars.sharp_tian_img_autoplayspped;
	var img_autotime = main_vars.sharp_tian_img_autoplaytime;   
	jQuery('.featuredimage_slider').each(function() {
		jQuery(this).addClass('owl-loaded owl-drag').owlCarousel({
	    	navigation : true, // Show next and prev buttons 
	    	loop: true,	
		    slideSpeed : 300,
		    paginationSpeed : 400,	 
		    items : 1, 
		    itemsDesktop : false,
		    itemsDesktopSmall : false,
		    itemsTablet: false,
		    itemsMobile : false,
		    nav: true,
		    sharp_tian_autoplay: img_auto,
	        sharp_tian_autoplaySpeed: img_autospeed,
	        sharp_tian_autoplayTimeout: img_autotime,
	    	navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		});
	});

	if(main_vars.sharp_tian_autoplay === 'true'){
		var auto=true;		
	}else{
		var auto=false;
	}


	var autospeed = main_vars.sharp_tian_autoplayspped;   
	var autotime = main_vars.sharp_tian_autoplaytime;   

	jQuery('.testinomial_owl_slider').each(function() {
		jQuery(this).addClass('owl-loaded owl-drag').owlCarousel({
		//jQuery('#testinomial_owl_slider').owlCarousel({
	    	navigation : true, // Show next and prev buttons 
	    	loop: true,	
		    slideSpeed : 300,
		    paginationSpeed : 400,	 
		    items : 1, 
		    itemsDesktop : false,
		    itemsDesktopSmall : false,
		    itemsTablet: false,
		    itemsMobile : false,
	    	margin:10,
	    	sharp_tian_autoplay: auto,
	        sharp_tian_autoplaySpeed: autospeed,
	        sharp_tian_autoplayTimeout: autotime,
	    	responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:1,
		            nav:false
		        }
		    }
		});	
		
	});

	if(main_vars.sharp_tian_sponsors_autoplay === 'true'){
		var sponsors_auto=true;		
	}else{
		var sponsors_auto=false;
	}


	var sponsors_autospeed = main_vars.sharp_tian_sponsors_autoplayspped;   
	var sponsors_autotime = main_vars.sharp_tian_sponsors_autoplaytime;   
	jQuery('.our_sponsors_demo').each(function() {
		jQuery(this).addClass('owl-loaded owl-drag').owlCarousel({
			//jQuery('#testinomial_owl_slider').owlCarousel({
				navigation : true, // Show next and prev buttons 
				loop: true,	
				slideSpeed : 300,
				paginationSpeed : 400,	 
				items : 4, 
				itemsDesktop : false,
				itemsDesktopSmall : false,
				itemsTablet: false,
				itemsMobile : false,
				margin:10,
				sharp_tian_autoplay: sponsors_auto,
	        	sharp_tian_autoplaySpeed: sponsors_autospeed,
	        	sharp_tian_autoplayTimeout: sponsors_autotime,
				responsive:{
					0:{
						items:1,
						nav:true
					},
					600:{
						items:4,
						nav:false
					}
				}
			});	
	});
});
