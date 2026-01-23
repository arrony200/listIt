require('./bootstrap');

import feather from 'feather-icons/dist/feather.min'

feather.replace();

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


window.$ = window.jQuery = require('jquery');

require('./slick-1.8.1.min');
require('./lity.min');

jQuery(window).scroll(function() {
    const scroll = jQuery(window).scrollTop();

    if (scroll >= 50) {
        jQuery('.sticky-header').addClass('sticky-header-active');
    } else {
        jQuery('.sticky-header').removeClass('sticky-header-active');
    }
});

jQuery(document).ready(function ($) {
	// Featured Slick Slider
	$('.featured_slick_gallery-slide').slick({
		centerMode: true,
		infinite:true,
		centerPadding: '40px',
		slidesToShow:2,
		responsive: [
		{
		breakpoint: 768,
		settings: {
		arrows:true,
		centerMode: true,
		centerPadding: '20px',
		slidesToShow:3
		}
		},
		{
		breakpoint: 480,
		settings: {
		arrows: false,
		centerMode: true,
		centerPadding: '20px',
		slidesToShow:1
		}
		}
		]
	});

    $(".civanoglu-menu, .civanoglu-menu-items a").on("click", function () {
        $(".civanoglu-menu-items").toggleClass('active');
    });
});
