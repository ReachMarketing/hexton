jQuery(document).ready(function ($) {
    // Hamburger menu toggle
    $(".menu-toggle").click(function() {	
        if($('#nav-icon').hasClass('open')){
            $('#nav-icon').removeClass('open');	
        }else{
            $('#nav-icon').addClass('open');
        }		
    });

    $('.fixed-header .menu-item a').click(function() {
        $('.fixed-header .menu-item a').removeClass('active');
        $(this).addClass('active');
    });

    $('.contact-sidebutton').click(function() {
        $('.fixed-header .menu-item a').removeClass('active');
    });


    slider = new Splide('.splide',{
        type   : 'loop',
        perPage: 1,
        pagination: false,
        focus: 0,
        padding: {right: '16.666666%', left: '25%' },
        arrows: false,
        wheel: false,
        speed: 1500,
    }
    ).mount();

    $(".splide-next").on('click', function() {slider.go('+1') });       

    function logActiveSlide() {
        var activeSlide = slider.Components.Elements.slides[slider.index];
        var subtitle = activeSlide.getAttribute('data-subtitle');
        var title = activeSlide.getAttribute('data-title');
        var text = activeSlide.getAttribute('data-text');

        /* ADD in here the animations for 
           1. fading out the initial text 
           2. adding in the new data from above
           3. fading back up

           do this within the timeframe of the slide transition time of 1500ms
        */

        $('.info-block .subtitle, .info-block .title, .info-block .text').animate({'opacity': 0}, 500);


        /* 2. change the text over */
        setTimeout(function() { 
            $('.info-block .subtitle').html(subtitle);
            $('.info-block .title').html(title);
            $('.info-block .text').html(text);
        }, 600);

        setTimeout(function() {
            $('.info-block .subtitle, .info-block .title, .info-block .text').animate({'opacity': 1}, 500);
        }, 605);
    }

    logActiveSlide();

    slider.on('move', logActiveSlide);

});
