$(function(){

	$.get('../menu.html', function(data){
		var menu = $(data)
		;

		$('#photography-menu').replaceWith(menu.find('#photography-menu'));

		$(".fade .menu-item")
			.css("opacity","0.3")
			.hover
			( function(){ // ON MOUSE OVER
					$(this).stop().animate
					( { opacity: 1.0
						}
					, "slow"
					);
				}
			, function(){ // ON MOUSE OUT
					$(this).stop().animate
					( { opacity: 0.3
						}
					, "slow"
					);
				}
			);
	});

	var canvas_height = window.innerHeight - 150;
	if (canvas_height > window.innerWidth) {
	canvas_height = window.innerWidth - 300;
	}



	$('#gallery')
	.galleria({
			height: canvas_height,
	}).show();









	var canvas_height4 = window.innerHeight - 150;
	var canvas_width4 = window.innerWidth - 20;


	$('#blog')
	.css({
			width:	canvas_width4,
			height: canvas_height4,
	}).show();


	var canvas_height2 = window.innerHeight - 30;
	var canvas_width2	= window.innerWidth -30;



	$('#parent')
	.css({ width: canvas_width2 })
	.css({ height: canvas_height2})



});


