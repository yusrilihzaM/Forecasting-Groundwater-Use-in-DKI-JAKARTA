/************************************
	Add preload to DOM
*************************************/
$('body').prepend('<div id="loader"><img class="loader-img" src="assets/images/loader.svg" alt="loader icon" /></div>') 

/************************************
	Wait for document loaded
*************************************/
window.onload = function () {
	
	/************************************
		Remove preload from DOM
	*************************************/
	$('#loader').fadeOut('400', function(){
		$(this).remove();
	});

	/************************************
		Main js code
	*************************************/
	$(document).ready(function() {
		"use strict";
		/************************************
	   		Make body always scroll to position 0
		*************************************/
		$(this).scrollTop(0);
		/************************************
	   		Jquery UI
		*************************************/
		   	//Accordion effect
				//Style 1
				$('#accordion').accordion({
					icons: false,
					heightStyle: "content",
					classes: {
				    	"ui-accordion": "accordion-block",
				    	"ui-accordion-header": "accordion-header",
				    	"ui-accordion-content": "accordion-content",
				  	}
				});

				//Style 2
				$('#accordion2').accordion({
					icons: false,
					heightStyle: "content",
					classes: {
				    	"ui-accordion": "accordion-block",
				    	"ui-accordion-header": "accordion-header",
				    	"ui-accordion-content": "accordion-content",
				  	},
				  	icons: { 
				  		"header": "ui-icon-plus", 
				  		"activeHeader": "ui-icon-minus" 
				  	}
				});

	   		//Jquery UI Tab
			$( "#tabs" ).tabs({
				show: { effect: "drop", duration: 400 },
				classes: {
				    "ui-tabs": "tab-block",
				  	"ui-tabs-nav": "tab-list",
				  	"ui-tabs-tab": "tab-name",
				  	"ui-tabs-panel": "tab-box"
			  	}
			});

	   		//Event date picker
			$('#date-picker').datepicker();

	   		//Price filter range (jquery ui slider)
			$( function() {
				$( "#slider-range" ).slider({
					range: true,
					min: 0,
					max: 300,
					values: [ 75, 150 ],
					slide: function( event, ui ) {
						$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
					}
				});
				$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
					" - $" + $( "#slider-range" ).slider( "values", 1 ) );
			});

		   	//Product Quantiy control
			$( function() {
				$('.plus').on('click',function(){
					event.preventDefault();
			        var $qty=$(this).closest('.quantity-control').find('.quantity');
			        var currentVal = parseInt($qty.val());
			        console.log($qty)
			        if (!isNaN(currentVal)) {
			            $qty.val(currentVal + 1);
			        }
			    }); 
			    $('.minus').on('click',function(){
			    	event.preventDefault();
			        var $qty=$(this).closest('.quantity-control').find('.quantity');
			        var currentVal = parseInt($qty.val());
			        if (!isNaN(currentVal) && currentVal > 1) {
			            $qty.val(currentVal - 1);
			        }
			    });
		    });

		/************************************
	   		Mobile navigation 
		*************************************/
			(function($) {
				function mediaSize() { 
					if (window.matchMedia('(min-width: 992px)').matches) {
						$('header.mobile .navigation .dropdown_menu').removeAttr('style')
						$('header.mobile .navigation .submenu-opener').removeClass('icon_plus icon_minus-06')
						$('#overlay').remove()
						$('header.mobile .navigation').removeAttr('style')
						$('header').removeClass('mobile')
						$('#overlay').remove();
					}
					else {
						$('header').addClass('mobile')
						$('header.mobile .navigation .submenu-opener').addClass('icon_plus')
						$('header.mobile .navigation .dropdown_menu').slideUp()
					}
				};
			 	mediaSize();
				window.addEventListener('resize', mediaSize, false);  
			})(jQuery);

			//Open/close dropdown menu in mobile 
			$('header.mobile .navigation .submenu-opener').on('click', function(event) {
				event.preventDefault();
				$(this).parent().siblings().children('.dropdown_menu').slideUp()
				$(this).parent().siblings().children('.submenu-opener').removeClass('icon_minus-06').addClass('icon_plus')
				$(this).toggleClass('icon_plus icon_minus-06');
				$(this).next().slideToggle('400');
			});
			
			//Open/close sidebar function
			function openCloseSideBar(btnToOpen,selectedSidebar) {
				$(btnToOpen).on('click', function(event) {
					event.preventDefault();
					let nav = $(selectedSidebar)
					nav.css({
						left: '0',
					});
					$(nav).parent().prepend('<a href="#" id="overlay"></a>')
					$(document).mouseup(function(e){
						e.preventDefault()
					    if (!nav.is(e.target) && nav.has(e.target).length === 0 && $(e.target).attr('id') == 'overlay') {
					        nav.css({
								left: '-100%',
							});
					        $('#overlay').remove();
					    }
					});
				});

			}

			//Navigtion mobile
			openCloseSideBar("#open-menu-sidebar","header.mobile .navigation")

		/************************************
	   		Search
		*************************************/
		$('#search').on('click', function(event) {
			$('body').prepend('<div id="search-box" class="fadeIn"><a href="#" id="close-searchbox"><i class="fas fa-times"></i></a> <form action="" method="GET"> <div class="input-group"> <input type="text" name="q" placeholder="What are you looking for?"> <button><i class="fas fa-arrow-right"></i></button> </div></form> </div>')
			$('#close-searchbox').click(function(event) {
				$(this).parent().fadeOut('400', function() {
					$(this).remove();
				});
			});
		});

		/************************************
	   		Back to top with scroll up
		*************************************/
		$(function () {
		    $.scrollUp({
		        scrollName: 'scrollUp',      // Element ID
		        scrollDistance: 500,         // Distance from top/bottom before showing element (px)
		        scrollSpeed: 1500,            // Speed back to top (ms)
		        easingType: 'easeOutCubic',        // Scroll to top easing (see http://easings.net/)
		        animationSpeed: 800,         // Animation speed (ms)
		        scrollText: '<i class="arrow_up"></i>', // Text for element, can contain HTML
		        activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		        zIndex: 7,          // Z-Index for the overlay
		    });
		});

		/************************************
	   		Navigation scroll fixed
		*************************************/
		var lastScrollTop = 0;
		$(window).scroll(function(event){
			var st = $(this).scrollTop();
			if(st > 400) {
				$(".header").addClass('hide').addClass('isScroll');
				if (st > lastScrollTop){
			      	$(".header").addClass('hide')
			      	
			   	} 
			   	else {
			   		$(".header").removeClass('hide')
			   	}
			   	lastScrollTop = st;
		   	}
		   	else {
		   		$(".header").removeClass('hide isScroll')
		   	}	
		});

		/************************************
	   		Review page masonry
		*************************************/
		$('.reviewer-group').masonry({
		  // options
		  itemSelector: '.reviewer-comment',
		  gutter: 30,
		});

		/************************************
	   		Sidebar
		*************************************/
		(function($) {
			function mediaSize() { 
				if (window.matchMedia('(min-width: 992px)').matches) {
					$('#sidebar').removeClass('fixed')
					$('#sidebar').removeAttr('style')
					$('#sidebar-opener').hide()
				}
				else {
					$('#sidebar').addClass('fixed')
					$('#sidebar-opener').show()
				}
			};
		 	mediaSize();
			window.addEventListener('resize', mediaSize, false);  
		})(jQuery);
		
		openCloseSideBar("#sidebar-opener","#sidebar")

		/************************************
	   		Cooming soon countdown
		*************************************/
		$('#countdown').countdown('2020/10/10', function(event) {
		  var $this = $(this).html(event.strftime(''
		    + '<div class="countdown-number"><span>%d</span><p>Days</p></div>'
		    + '<div class="countdown-number"><span>%H</span><p>Hours</p></div>'
		    + '<div class="countdown-number"><span>%M</span><p>Minutes</p></div>'
		    + '<div class="countdown-number"><span>%S</span><p>Seconds</p></div>'));
		});

		/************************************
	   		Pricing plan switch
		*************************************/
		const plantSwitchBtn = $('#plan-switch')
		const monthPlan = $('#month-plan')
		const yearPlan = $('#year-plan')
		const yearPlanWrapper = $('.planes_wrapper[data-plan="year-plan"]')
		const monthPlanWrapper = $('.planes_wrapper[data-plan="month-plan"]')

		$( function() {
			if (!plantSwitchBtn.hasClass('switched')) {
				monthPlan.addClass('active')
			}
			if(monthPlan.hasClass('active')) {
				yearPlanWrapper.hide();
			}

			plantSwitchBtn.on('click', function(event) {
				$(this).toggleClass('switched');
				if($(this).hasClass('switched')){
					monthPlan.removeClass('active')
					yearPlan.addClass('active')
				}
				else {
					monthPlan.addClass('active')
					yearPlan.removeClass('active')
				}

				if(monthPlan.hasClass('active')){
					yearPlanWrapper.removeClass('fadeInUp').hide(0)
					monthPlanWrapper.addClass('fadeInUp').show(0);
				}
				else {
					monthPlanWrapper.removeClass('fadeInUp').hide(0);
					$('.planes_wrapper[data-plan="year-plan"]').addClass('fadeInUp').show(0)
				}

			});	
		});

		/************************************
	   		Blog masonri, masonry layout
		*************************************/
		$('.blog-masonri_group').masonry({
		  // options
		  itemSelector: '.insight-regular',
		  gutter: 30,
		});
		
	    /************************************
	   		Checkout page (Check to checkbox to open content)
		*************************************/
		$( function() {
			$('.check-to-show input[type="checkbox"]').siblings('.show-content').slideUp()
			$('.check-to-show input[type="checkbox"]').on('click', function(event) {
				if($(this).is(":checked")) {
					$(this).siblings('.show-content').slideDown('300');
				}
				else {
					$(this).siblings('.show-content').slideUp('300');
				}
			});
		});
		
		/************************************
	   		Sliders
		*************************************/
		//Partners
		$('.partners-group').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			arrows: false,
			swiper: false,
			autoplay: true,
			autoplaySpeed: 3000,
			swipe: false,
			responsive: [
			    {
			      breakpoint: 992,
			      settings: {
			        slidesToShow: 4
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 3
			      }
			    },
			    {
			      breakpoint: 576,
			      settings: {
			        slidesToShow: 2
			      }
			    }
		  	]
		});

		//Homepage 2 featured cases 
		$('.featured-cases_bottom__style1 .cases-group').slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			adaptiveHeight: true,
			dotsClass: 'slider-dots',
			appendDots: '.h2-featured-cases .cases_slider-control',
		    customPaging : function(slider, i) {
		        return '<div class="dots"></div>';
		    },
		    responsive: [
			    {
			      breakpoint: 992,
			      settings: {
			        slidesToShow: 1,
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 1,
			      }
			    },
			    {
			      breakpoint: 576,
			      settings: {
			        slidesToShow: 1,
			      }
			    },
			    {
			      breakpoint: 0,
			      settings: {
			        slidesToShow: 1,
			      }
			    }
		  	]
		})

		//Homepage 2 counselor
		$('.counselor-wrapper').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			dotsClass: 'slider-dots',
			appendDots: '.h2-section3 .counselor_slider-control',
		    customPaging : function(slider, i) {
		        return '<div class="dots"></div>';
		    },
		})

		//Homepage 2 insight
		$('.h2-insights-group').slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			arrows: true,
			prevArrow: '<button type="button" class="slider-arrow prev-slider"><i class="arrow_left"></i></button>',
			nextArrow: '<button type="button" class="slider-arrow next-slider"><i class="arrow_right"></i></button>',
		    responsive: [
			    {
			      breakpoint: 992,
			      settings: {
			        slidesToShow: 1,
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 2,
			      }
			    },
			    {
			      breakpoint: 576,
			      settings: {
			        slidesToShow: 1,
			      }
			    },
		  	]
		})

		//Homepage 3 feature case

		let homepage3Slider = {

		}

		$('.featured-cases_bottom__style2 .cases-group').slick({
			adaptiveHeight: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			dotsClass: 'slider-dots',
			appendDots: '.h3-featured-cases .cases_slider-control',
		    customPaging : function(slider, i) {
		        return '<div class="dots"></div>';
		    },
		    responsive: [
			    {
			      breakpoint: 992,
			      settings: {
			        slidesToShow: 2,
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 2,
			      }
			    },
			    {
			      breakpoint: 576,
			      settings: {
			        slidesToShow: 1,
			      }
			    },
			    {
			      breakpoint: 0,
			      settings: {
			        slidesToShow: 1,
			      }
			    }
		  	]
		})

		//Homepage 3
		$('.h3-lastest-insight .insights-group').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: false,
			dots: false,
			dotsClass: 'slider-dots',
		    customPaging : function(slider, i) {
		        return '<div class="dots"></div>';
		    },
		    responsive: [
			    {
			      breakpoint: 992,
			      settings: {
			        slidesToShow: 2,
			        dots: true,
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 2,
			        dots: true,
			      }
			    },
			    {
			      breakpoint: 576,
			      settings: {
			        slidesToShow: 1,
			         dots: true,
			      }
			    },
			    {
			      breakpoint: 0,
			      settings: {
			        slidesToShow: 1,
			       
					
			      }
			    }
		  	]
		})

		//About us 
		$('.about .about-content .our-job-part .services-group-style2').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			dotsClass: 'slider-dots',
			appendDots: '.about .about-content .our-job-part .services-group_control',
		    customPaging : function(slider, i) {
		        return '<div class="dots"></div>';
		    },
		    responsive: [
			    {
			      breakpoint: 992,
			      settings: {
			       	slidesToShow: 2,
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 1,
			      }
			    },
			    {
			      breakpoint: 576,
			      settings: {
			       	slidesToShow: 1,
			      }
			    },
		  	]
		})


		//Blog Detail
		$('.blog .blog-detail .image-group_wrapper').slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			dots: false,
			appendArrows: '.image-group_control',
			prevArrow: '<button type="button" class="slider-arrow prev-slider"><i class="arrow_left"></i></button>',
			nextArrow: '<button type="button" class="slider-arrow next-slider"><i class="arrow_right"></i></button>'
		})

		//Shop detail product slide show
		$('.slider-single').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: false,
			adaptiveHeight: true,
			infinite: false,
			useTransform: true,
			vertical: true,
			verticalSwiping: true,
			speed: 400,
			cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
			responsive: [
				{
			      breakpoint: 992,
			      settings: {
			       	vertical: false,
					verticalSwiping: false,
			      }
			    },
			    {
			      breakpoint: 768,
			    },
			    {
			      breakpoint: 576,
			      settings: {
			       	vertical: false,
					verticalSwiping: false,
			      }
			    },
		  	]
		});

		$('.slider-nav')
		.on('init', function(event, slick) {
			$('.slider-nav .slick-slide.slick-current').addClass('is-active');
		})
		.slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			focusOnSelect: false,
			infinite: false,
			vertical: true,
			verticalSwiping: true,
			prevArrow: '<button type="button" class="slider-arrow prev-slider"><i class="arrow_left"></i></button>',
			nextArrow: '<button type="button" class="slider-arrow next-slider"><i class="arrow_right"></i></button>',
			responsive: [
			    {
			      breakpoint: 992,
			      settings: {
			       	slidesToShow: 3,
			      	slidesToScroll: 1,
			       	vertical: false,
			       	swipe: false,
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        arrows: true,
			      }
			    },
			    {
			      breakpoint: 576,
			      settings: {
			      	slidesToShow: 3,
			      	slidesToScroll: 1,
			       	vertical: false,
			       	swipe: false,
			      }
			    },
		  	]
		});

		$('.slider-single').on('afterChange', function(event, slick, currentSlide) {
			$('.slider-nav').slick('slickGoTo', currentSlide);
			var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
			$('.slider-nav .slick-slide.is-active').removeClass('is-active');
			$(currrentNavSlideElem).addClass('is-active');
		});

		$('.slider-nav').on('click', '.slick-slide', function(event) {
			event.preventDefault();
			var goToSingleSlide = $(this).data('slick-index');
			$('.slider-single').slick('slickGoTo', goToSingleSlide);
		});
	});

	
}