(function($) {

	"use strict";

	//Hide Loading Box (Preloader)

	function handlePreloader() {
        var $preloader = $('.preloader');
        if (!$preloader.length) {
            return;
        }

        var homlisti_ignore_onbeforeunload = true;
        $('a[href^=mailto], a[href^=tel]').on('click', function () {
            homlisti_ignore_onbeforeunload = false;
        });

        $(window).on('beforeunload', function () {
            if (homlisti_ignore_onbeforeunload) {
                $preloader.fadeIn('slow');
            }
            homlisti_ignore_onbeforeunload = true;
        });

        $preloader.delay(200).fadeOut('slow');
    }


	//Update Header Style and Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var scrollLink = $('.scroll-top');
			if (windowpos >= 110) {
				siteHeader.addClass('fixed-header');
				scrollLink.addClass('open');
			} else {
				siteHeader.removeClass('fixed-header');
				scrollLink.removeClass('open');
			}
		}
	}

	headerStyle();

	if ($('.listing-types li').length) {
        $('.listing-types li .expend').on("click", function() {
            if ($(this).parent().hasClass('current')) {
                $(this).parent().removeClass('current');
            } else {
                $(this).parent().addClass('current');
            }
        });
    }

	//Submenu Dropdown Toggle
	if($('.main-header li.menu-item-has-children ul').length){
		$('.main-header .navigation li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>');
	}

	if($('.main-header li.megamenu-item .megamenu').length){
		$('.main-header .navigation li.megamenu-item').append('<div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>');
	}



	//Mobile Nav Hide Show
	if($('.mobile-menu').length){

		$('.mobile-menu .menu-box').mCustomScrollbar();

		var mobileMenuContent = $('.main-header .menu-area .main-menu').html();

		$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
		$('.sticky-header .main-menu').append(mobileMenuContent);

		//Dropdown Button
		$('.mobile-menu li.menu-item-has-children .dropdown-btn').on('click', function() {
			$(this).toggleClass('open');
			$(this).prev('ul').slideToggle(500);
		});

		//Dropdown Button
		$('.mobile-menu li.megamenu-item .dropdown-btn').on('click', function() {
			$(this).toggleClass('open');
			$(this).prev('.megamenu').slideToggle(500);
		});
		//Menu Toggle Btn
		$('.mobile-nav-toggler').on('click', function() {
			$('body').addClass('mobile-menu-visible');
		});

		//Menu Toggle Btn
		$('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
			$('body').removeClass('mobile-menu-visible');
		});
	}


	$(".widget-boxed-header").on('click', function() {
		$(this).toggleClass('open');
		$(this).next('.widget-boxed-body').slideToggle(400);
	});

	$("#sidebar-filter").on('click', function() {
		$('.toggle-sidebar').toggleClass('open');
	});

	$(".toggle-sidebar-close").on('click', function() {
		$('.toggle-sidebar').removeClass('open');
	});

	$(".lang span").on('click', function() {
		$(".lang").toggleClass('active');
	});

	$(".lang ul li a").on('click', function() {
		var text = $(this).html();
		$(".lang span").empty().append(text);
		$(".lang").removeClass('active');
	});


/* init widget */
// $("#rangeslider").slider({
//     range: true,
//     max: 100,
//     values: [2, 8],
//     slide: function(event, ui) {
//       var min = ui.values[0];
//       var max = ui.values[1];
//       $("[name=min]").val(min);
//       $("[name=max]").val(max);
//     }
// });


/* show initial values */
// var min = $("#rangeslider").slider("values", 0);
// var max = $("#rangeslider").slider("values", 1);
// $("[name=min]").val(min);
// $("[name=max]").val(max);


	// Scroll to a Specific Div
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1000);
		});
	}




	// Elements Animation
	if($('.wow').length){
		var wow = new WOW({
		mobile:       false
		});
		wow.init();
	}

	//Fact Counter + Text Count
	if($('.count-box').length){
		$('.count-box').appear(function(){
			var $t = $(this),
				n = $t.find(".count-text").attr("data-stop"),
				r = parseInt($t.find(".count-text").attr("data-speed"), 10);

			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function() {
						$t.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function() {
						$t.find(".count-text").text(this.countNum);
					}
				});
			}

		},{accY: 0});
	}

	//Tabs Box
	if($('.tabs-box').length){
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));

			if ($(target).is(':visible')){
				return false;
			}else{
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).addClass('active-tab');
			}
		});
	}

	// banner-carousel
	if ($('.banner-carousel').length) {
        $('.banner-carousel').owlCarousel({
            loop:true,
			margin:0,
			nav:true,
			animateOut: 'fadeOut',
    		animateIn: 'fadeIn',
    		active: true,
			smartSpeed: 1000,
			autoplay: 6000,
            navText: [ '<span class="flaticon-right-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                800:{
                    items:1
                },
                1024:{
                    items:1
                }
            }
        });
    }


    //one-item-carousel
    if ($('.one-item-carousel').length) {
		$('.one-item-carousel').owlCarousel({
		  loop: true,
		  items: 1,
		  margin: 30,
		  nav: true,
		  smartSpeed: 1000,
		  autoplay: true,
		  autoplayTimeout: 5000,
		  navText: ['<i class="las la-angle-left"></i>', '<i class="las la-angle-right"></i>'],
		});
	}



    if ($('.one-item-carousel').length) {
		$('.one-item-carousel').owlCarousel({
		  loop: true,
		  items: 1,
		  center: true,
		  margin: 30,
		  nav: true,
		  smartSpeed: 1000,
		  autoplay: true,
		  autoplayTimeout: 5000,
		  navText: ['<i class="las la-angle-left"></i>', '<i class="las la-angle-right"></i>'],
		});
	}

    //four-item-carousel
    if ($('.four-item-carousel').length) {
		$('.four-item-carousel').owlCarousel({
		  loop: true,
		  margin: 30,
		  smartSpeed: 1000,
		  autoplay: true,
		  autoplayTimeout: 5000,
		  nav:true,
		  navText: ['<i class="las la-angle-left"></i>', '<i class="las la-angle-right"></i>'],
		  responsive: {
			0: {
			  items: 1
			},
			480: {
			  items: 1
			},
			600: {
			  items: 2
			},
			800: {
			  items: 2
			},
			1024: {
			  items: 4
			}
		  }
		});
	}

    if ($('.review-item-carousel').length) {
        $('.review-item-carousel').owlCarousel({
          center: true,
          loop: true,
          nav: true,
          smartSpeed: 1000,
          autoplay: 500,
          navText: ['<i class="las la-angle-left"></i>', '<i class="las la-angle-right"></i>'],
          responsive: {
            0: {
              items: 1
            },
            480: {
              items: 1
            },
            600: {
              items: 2
            },
            800: {
              items: 2
            },
            1024: {
              items: 3
            }
          }
        });
      }

	//Sortable Masonary with Filters
	function enableMasonry() {
		if($('.sortable-masonry').length){

			var winDow = $(window);
			// Needed variables
			var $container=$('.sortable-masonry .items-container');
			var $filter=$('.filter-btns');

			$container.isotope({
				filter:'*',
				 masonry: {
					columnWidth : '.masonry-item.small-column'
				 },
				animationOptions:{
					duration:500,
					easing:'linear'
				}
			});


			// Isotope Filter
			$filter.find('li').on('click', function(){
				var selector = $(this).attr('data-filter');

				try {
					$container.isotope({
						filter	: selector,
						animationOptions: {
							duration: 500,
							easing	: 'linear',
							queue	: false
						}
					});
				} catch(err) {

				}
				return false;
			});


			winDow.on('resize', function(){
				var selector = $filter.find('li.active').attr('data-filter');

				$container.isotope({
					filter	: selector,
					animationOptions: {
						duration: 500,
						easing	: 'linear',
						queue	: false
					}
				});
			});


			var filterItemA	= $('.filter-btns li');

			filterItemA.on('click', function(){
				var $this = $(this);
				if ( !$this.hasClass('active')) {
					filterItemA.removeClass('active');
					$this.addClass('active');
				}
			});
		}
	}

	enableMasonry();


	if ($('.listit-featured_slick_gallery-slide').length) {
		$('.listit-featured_slick_gallery-slide').bxSlider({
			controls: true,
			prevText: '<i class="fas fa-chevron-left"></i>',
			nextText: '<i class="fas fa-chevron-right"></i>',
	        mode: 'fade',
	        auto: true,
	        speed: 700,
	        pagerCustom: '.slider-pager .thumb-box'
	    });
	};

    if ($('.five-item-carousel').length) {
		$('.five-item-carousel').owlCarousel({
		  center: true,
		  loop: true,
		  margin: 30,
		  nav: true,
		  smartSpeed: 1000,
		  autoplay: 500,
		  navText: ['<i class="las la-angle-left"></i>', '<i class="las la-angle-right"></i>'],
		  responsive: {
			0: {
			  items: 1
			},
			480: {
			  items: 1
			},
			600: {
			  items: 2
			},
			800: {
			  items: 2
			},
			1024: {
			  items: 3
			}
		  }
		});
	  }


	$(document).ready(function($) {
		//Check if an element was in a screen
		function isScrolledIntoView(elem){
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();
			if ($(elem).length) {
				var elemTop = $(elem).offset().top;
			}
			var elemBottom = elemTop + $(elem).height();
			return ((elemBottom <= docViewBottom));
		}
		//Count up code
		function countUp() {
			$('.counter').each(function() {
			  var $this = $(this), // <- Don't touch this variable. It's pure magic.
				  countTo = $this.attr('data-count'),
				  ended = $this.attr('ended');

			if ( ended != "true" && isScrolledIntoView($this) ) {
				$({ countNum: $this.text()}).animate({
				countNum: countTo
			  },
			  {
				duration: 2500, //duration of counting
				easing: 'swing',
				step: function() {
				  $this.text(Math.floor(this.countNum));
				},
				complete: function() {
				  $this.text(this.countNum);
				}
			  });
			$this.attr('ended', 'true');
			}
			});
		}
		//Start animation on page-load
		if ( isScrolledIntoView(".counter") ) {
			countUp();
		}
		//Start animation on screen
		$(document).scroll(function() {
			if ( isScrolledIntoView(".counter") ) {
				countUp();
			}
		});
	});

	$('.listit-countdown').each(function() {

        var date = $(this).data('date');
        var activeId = $(this).data('id');

        if($(this).length){

            var countDownDate = new Date(date).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get today's date and time
              var now = new Date().getTime();

              // Find the distance between now and the count down date
              var distance = countDownDate - now;

              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Output the result in an element with id="demo"
              document.getElementById(activeId).innerHTML = "<div class='countitem'><span class='countitem-number'>"+days + "</span><span class='countitem-title'>days</span></div><div class='countitem'><span class='countitem-number'>" + hours + "</span><span class='countitem-title'>hours </span></div><div class='countitem'><span class='countitem-number'>"
              + minutes + "</span><span class='countitem-title'>minutes</span></div><div class='countitem'><span class='countitem-number'>" + seconds + "</span><span class='countitem-title'>seconds</span></div>";

              // If the count down is over, write some text
              if (distance < 0) {
                clearInterval(x);
                document.getElementById(activeId).innerHTML = "EXPIRED";
              }
            }, 1000);
        }

	  });




	if($('.myChart').length){
	  const ctx = document.getElementById('myChart').getContext('2d');
	  const myChart = new Chart(ctx, {
		  type: 'bar',
		  data: {
			  labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
			  datasets: [{
				  label: '# of Votes',
				  data: [12, 19, 3, 5, 2, 3],
				  backgroundColor: [
					  'rgba(255, 99, 132, 0.2)',
					  'rgba(54, 162, 235, 0.2)',
					  'rgba(255, 206, 86, 0.2)',
					  'rgba(75, 192, 192, 0.2)',
					  'rgba(153, 102, 255, 0.2)',
					  'rgba(255, 159, 64, 0.2)'
				  ],
				  borderColor: [
					  'rgba(255, 99, 132, 1)',
					  'rgba(54, 162, 235, 1)',
					  'rgba(255, 206, 86, 1)',
					  'rgba(75, 192, 192, 1)',
					  'rgba(153, 102, 255, 1)',
					  'rgba(255, 159, 64, 1)'
				  ],
				  borderWidth: 1
			  }]
		  },
		  options: {
			  scales: {
				  y: {
					  beginAtZero: true
				  }
			  }
		  }
	  });
	}

	/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */

	$(window).on('scroll', function() {
		headerStyle();
	});



	/* ==========================================================================
   When document is loaded, do
   ========================================================================== */

	$(window).on('load', function() {
		handlePreloader();
		enableMasonry();
	});



})(window.jQuery);
