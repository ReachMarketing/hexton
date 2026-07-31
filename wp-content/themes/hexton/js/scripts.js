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
});
