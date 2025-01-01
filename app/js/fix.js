/* ---------------------------------------------------------------------- */
/*	Masonry
/* ---------------------------------------------------------------------- */
	$(window).load(function(){
	var $container = $('#content')
	// initialize Isotope
	$container.isotope({
	  // options...
	  resizable: false, // disable normal resizing
	  // set columnWidth to a percentage of container width
	  masonry: { columnWidth: $container.width() / 2 }
	});
	// update columnWidth on window resize
	$(window).smartresize(function(){
	  $container.isotope({
		// update columnWidth to a percentage of container width
		masonry: { columnWidth: $container.width() / 2 }
	  });
	});
	});

	/* ---------------------------------------------------------------------- */
	/*	Accordion 1
	/* ---------------------------------------------------------------------- */
	/*!
	*/
	$(document).ready(function()
	{
	//Add Inactive Class To All Accordion Headers
	$('.accordion-header').toggleClass('inactive-header');
	//Set The Accordion Content Width
	var contentwidth = $('.accordion-header').width();
	$('.accordion-content').css({'width' : contentwidth });
	//Open The First Accordion Section When Page Loads
	$('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
	$('.accordion-content').first().slideDown().toggleClass('open-content');
	// The Accordion Effect
	$('.accordion-header').click(function () {
		if($(this).is('.inactive-header')) {
			$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
		else {
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
	});
	return false;
	});
	/* ---------------------------------------------------------------------- */
	/*	Accordion 2
	/* ---------------------------------------------------------------------- */
	var clickElem = $('#accordion div h4');
	clickElem.on('click', function(){
		var $this = $(this),
			parentCheck = $this.parent('div');
		if( !parentCheck.hasClass('active')) {
			var accordItems = $('#accordion div');
			accordItems.removeClass('active');
			parentCheck.addClass('active');
		}
	});

<!-- CALL FAQS -->
$(document).ready(function () {
// ---- FAQs ---------------------------------------------------------------------------------------------------------------
	$('.cat dd').hide(); // Hide all DDs inside .faqs
	$('.cat dt').hover( // Add class "hover" on dt when hover
		function(){$(this).addClass('hover')},
		function(){$(this).removeClass('hover')}
	).click(function(){ // Toggle dd when the respective dt is clicked
	    
	    var $t = $(this).next();

	    if ($t.is(':visible')) {
	        $t.slideUp('fast');
	        $t.prev().removeClass('selected');
	        // Other stuff to do on slideUp
	    } else {
	        $t.slideDown('slow');
	        $t.prev().addClass('selected');
	        // Other stuff to down on slideDown
	    }
		/*$(this).next().slideToggle('normal',); */ //Old toggle function
		}
	); 
});
