
//This is the preferred method used in libraries such as jQuery
//http://stackoverflow.com/questions/641857/javascript-window-resize-event

var addEvent = function(elem, type, eventHandle) {
    if (elem == null || typeof(elem) == 'undefined') return;
    if ( elem.addEventListener ) {
        elem.addEventListener( type, eventHandle, false );
    } else if ( elem.attachEvent ) {
        elem.attachEvent( "on" + type, eventHandle );
    } else {
        elem["on"+type]=eventHandle;
    }
};

//Check landscape orientation
function isLandscape(){
	return $(window).height() > $(window).width() ? true : false;
}

$(function(){

	//Preloader
	$(window).load(function(){
        $(".loader").delay(600).fadeOut("slow");
        $(".navbar-wrapper").fadeIn(0);
	});

	//Counters
	var options = {
		useEasing : true, 
		useGrouping : false, 
		separator : ',', 
		decimal : '.', 
		prefix : '', 
		suffix : '' 
	};    

	var counters = {}, demos = {};

	var isotopContainer = $('#isotope');
	
	//images loaded
	isotopContainer.imagesLoaded( function() {

	  //Init isotope	
	  isotopContainer.isotope({
		itemSelector: '.gallery-isotope__item',
		});
	    
	    //Init waypoints 
	    $('#benefits').waypoint({
		  handler: function() {
		    $('.benefits__amount').each(function(e){
		    	var valParam = $(this).val();	
			    	counters.nameCount = "count-0" + (e + 1);
			    	demos[counters.nameCount] = new countUp(counters.nameCount, 0, valParam, 0, 7, options);
			    	demos[counters.nameCount].start();	    	
		    });		
		    $(this)[0].enabled = false;
		  },
		  offset: 'bottom-in-view',
		});
	});	

	$('.gallery-isotope__filter a').click(function(){
		$('.gallery-isotope__filter a').removeClass('active');
		$(this).addClass('active');

		var selector = $(this).attr('data-filter');
		isotopContainer.isotope({
		  filter: selector,
		  animationOptions: {
		      duration: 1000,
		      easing: 'easeOutQuart',
		      queue: false
		  }
		});
		return false;
	});	

	//Our work
	$(".owl-slider__container").owlCarousel({
		navigation:true,
		pagination:false,
		singleItem:true,
		mouseDrag:false,
		//transitionStyle :'fade',
		mouseDrag:false,
	});		

	//Reviews carousel
	$(".reviews-carousel").owlCarousel({
		navigation:true,
		pagination:false,
		singleItem:true,
		mouseDrag:false
	});	

	//Our partners	
	$(".line-carousel").owlCarousel({
		navigation:false,
		pagination:true,
		items : 6,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3],
	});				

	//Faq
	$('.tabs_faq__ul a').click(function (e) {
		var idscroll = $(this).attr('href'),
			windowWidth = $(window).width();

			e.preventDefault();
			$(this).tab('show');

		if(windowWidth <= 750) {
			$.scrollTo(".tabs_faq__content", 1000,{
				offset : {top:-20, left: 0}
			});		
		}	
	});	

	//Dialog
	cbDialog = document.getElementById('callback'),
	dlg = new DialogFx( cbDialog );
	$('[data-dialog = callback]').click(dlg.toggle.bind(dlg));
	$('[data-dialog = callback]').click(function() {
		$('body').addClass("hidden");
		$('html').addClass("hidden");
	})


    //ScrollSpy    
    var sections = $(".section"),
    	menu_links = $(".navbar__nav a");

    $(window).scroll(function(){

        sections.filter(":in-viewport:first").each(function(){
            var active_section = $(this);
            var active_link = $('.scroll-nav li a[href="#' + active_section.attr("id") + '"]');
            menu_links.removeClass("active-item");
            active_link.addClass("active-item");
            $('.navbar__nav a[href="#' + active_section.attr("id") + '"]').addClass("active-item");
        });
    });	

    $('.navbar__nav a').click(function(){
        var idscroll = $(this).attr('href');
        $.scrollTo(idscroll, 1000,{
        	offset : {top:-44, left: 0}
        });
        return false;
    });
	
	//ScrollSpy with slider
	$('.it-aimation a').click(function(){
        var idscroll = $(this).attr('href');
        $.scrollTo(idscroll, 1000,{
        	offset : {top:-44, left: 0}
        });
        return false;
    });


	//First display
	$(".present-carousel").owlCarousel({
		navigation:false,
		pagination:true,
		singleItem:true,
		transitionStyle :'fade',
		mouseDrag:false,
		addClassActive:true,
	});	

	function presentDisplayCalc(display, descr, offsetTop, marginSumm) {
		var viewport = $(window).height(),
			displayHeight = viewport - offsetTop,
			descrHeight = descr.height(),
			paddingToDescr = (displayHeight - descrHeight) / 2;

		if(displayHeight > descrHeight + marginSumm) {
			display.css({
				'height':displayHeight +'px',
				'paddingTop':paddingToDescr + 'px',
			});
			descr.css({
				'marginTop': 0,
				'marginBottom':0,					
			});				
		} else {
			display.css({
				'height':'auto',
				'paddingTop': 0,
			});
			descr.css({
				'marginTop': marginSumm / 2,
				'marginBottom': marginSumm / 2,					
			});
		}
	}
	
	presentDisplayCalc(
		$('.fs-present-display'),
		$('.present-info'), 
		$('.easy-header').height(), 96);

	addEvent(window, "resize", function(){
		presentDisplayCalc(
			$('.fs-present-display'),
			$('.present-info'), 
			$('.easy-header').height(), 96);
	});	

	//Clickable phones
	if(jQuery.browser.mobile) {
		$('.modificated-to-mobile span').each(function(){
			var formatPhone = $(this).text().split(/\D+/g).join('');	
			$(this).html('<a href="tel:+' + formatPhone + '">' + $(this).text() + '</a>');
		});
	}	

});

$(window).load(function(){
  $(".navbar-wrapper").sticky(); 
});

/**
 * jQuery.browser.mobile (http://detectmobilebrowser.com/)
 *
 * jQuery.browser.mobile will be true if the browser is a mobile device
 *
 **/

(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);  