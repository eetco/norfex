$(function() {
    setInterval ( "slideSwitch(500)", 2500 );    
});

function slideSwitch(switchSpeed) {
    
	var $active = $('#slideshow IMG.active');
    var $active_text = $('#slideshow_text TR.active');

    
    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');
    if ( $active_text.length == 0 ) $active_text = $('#slideshow_text TR:last');

    var $next =  $active.next('IMG').length ? $active.next('IMG')
       : $('#slideshow IMG:first');

    var $next_text =  $active_text.next('TR').length ? $active_text.next('TR')
       : $('#slideshow_text TR:first');

    /*
    var $sibs  = $active.siblings();
    var rndNum = Math.floor(Math.random() * $sibs.length );
    var $next  = $( $sibs[ rndNum ] );
    */
    
    $active.addClass('last-active');
    $active_text.addClass('last-active');
	
	$next_text.css({opacity: 0.0})
		.addClass('active')
		.animate({opacity: 1.0}, switchSpeed, function() {
			$active_text.removeClass('active last-active');		
		});
		

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, switchSpeed, function() {
            $active.removeClass('active last-active');
        });
}


