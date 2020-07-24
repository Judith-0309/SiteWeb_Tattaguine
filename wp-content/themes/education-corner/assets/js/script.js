jQuery(document).ready(function() {
	/* Slider */
	var swiper = new Swiper('.home-member', {
		nextButton: '.slider-next',
        prevButton: '.slider-prev',
        slidesPerView: '4',
		spaceBetween: 10,
		autoplay:11000,
		breakpoints: {
            1024: {
                slidesPerView: 4,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
   
	/* Member */
 });
 
  jQuery(document).ready(function() {
	/* Slider */
	var swiper = new Swiper('.home-client', {
		nextButton: '.client-next',
        prevButton: '.client-prev',
        slidesPerView: '5',
		spaceBetween: 10,
		autoplay:5000,
		breakpoints: {
            1024: {
                slidesPerView: 4,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
   
	/* Client */
 });
 
 jQuery(document).ready(function() {
	/* Slider */
	var swiper = new Swiper('.home-blog', {
		nextButton: '.blog-next',
        prevButton: '.blog-prev',
        slidesPerView: '3',
		spaceBetween: 10,
		autoplay:9000,
		breakpoints: {
            1024: {
                slidesPerView: 4,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
   
	/* Client */
 });