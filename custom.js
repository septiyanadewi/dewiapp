$(function(){
	$(document).ready(function(){
		if (pId=='7') {
			$('.header-global-navigation ul li.parent-1').css('border-bottom','4px solid rgb(252,192,72)');
		};
		if (pId=='427') {
			$('.header-global-navigation ul li.parent-2').css('border-bottom','4px solid rgb(252,192,72)');
		};
		if (pId=='28') {
			$('.header-global-navigation ul li.parent-3').css('border-bottom','4px solid rgb(252,192,72)');
		};
		if (pId=='18') {
			$('.header-global-navigation ul li.parent-4').css('border-bottom','4px solid rgb(252,192,72)');
		};
		if (pId=='32') {
			$('.header-global-navigation ul li.parent-5').css('border-bottom','4px solid rgb(252,192,72)');
		};
		// if (pId=='10' || pId=='14' || pId=='20' || pId=='16') {
		// 	$('.header-global-navigation ul li.parent-4').css('border-bottom','4px solid rgb(252,192,72)');
		// };
	})

	if (pId=='7') {
		//topPageMap();	
	};

	if (pId=='757') {
		//roomPageMap();	
	};

	function topPageMap() {
	    var mapOptions = {
		    zoom: 6,
		    scrollwheel: false,
	        center: new google.maps.LatLng(36.795050, 135.984455),
	    };
	var map = new google.maps.Map(document.getElementById("topPageMap"), mapOptions);
	}

	function roomPageMap() {
	    var mapOptions = {
		    zoom: 6,
		    scrollwheel: false,
	        center: new google.maps.LatLng(36.795050, 135.984455),
	    };
	var map = new google.maps.Map(document.getElementById("roomPageMap"), mapOptions);
	}

	$('.header-sp .hamburger-icon button').on('click', function(){
		if ($('.sp-menu').hasClass('opened')) {
			$('.sp-menu').removeClass('opened');
			$('.sp-menu').css('right','-100%');
			// $('.sp-menu').hide();
		}else{
			$('.sp-menu').addClass('opened');
			$('.sp-menu').css('right','0');
			// $('.sp-menu').show();

		};
	})

	$('.header-sp .sp-menu button.close').on('click', function(){
		if ($('.sp-menu').hasClass('opened')) {
			$('.sp-menu').removeClass('opened');
			$('.sp-menu').css('right','-100%');
			// $('.sp-menu').hide();
		}else{
			$('.sp-menu').addClass('opened');
			$('.sp-menu').css('right','0');
			// $('.sp-menu').show();

		};
	})


});