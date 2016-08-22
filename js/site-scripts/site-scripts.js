// define $
$ = jQuery.noConflict();

// Width detector. Good for triggering responsive actions
$(document).ready(function(){
	var compareWidth; 
	var detector;
	detector = $('#wrapper'); // whatever container accurately reflects the site width
	compareWidth = detector.width();
	$(window).resize(function(){
		if(detector.width()!=compareWidth){
			compareWidth = detector.width();
			if(detector.width()>500){ //if wrapper is greater than 500px wide
			//	do something
			}
		}
	});
});