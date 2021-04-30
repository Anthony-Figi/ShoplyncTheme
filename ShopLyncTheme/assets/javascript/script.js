jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks
    
    // Run the script once the document is ready
    $(document).ready(function() {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 135) {
            $('#sticky-header').removeClass("hidden");
        } else {
            $('#sticky-header').addClass("hidden");
        }
    });

	let fancyboxElements = $("a.fancybox");
	if(fancyboxElements.length > 0){
		fancyboxElements.fancybox({
			'transitionIn': 'elastic',
			'transitionOut': 'elastic',
			'titlePosition': 'over',
			'padding': 0,
			'cyclic': true
		});
	}


    });

    // Run the script once the window finishes loading
    $(window).load(function(){
    });


});