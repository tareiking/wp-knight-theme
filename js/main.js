(function($) {

    // Sticky Menu
    $(document).ready(function(e) {
        $('#main-menu').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false
        });
    });

    // WOW Animations
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
    document.getElementById('').onclick = function() {
      var section = document.createElement('section');
      section.className = 'wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };

    // Scroll to section : Only applies to single-page templates
    // $(window).load(function(){
    //   $('.main-nav li a').bind('click',function(event){
    //     var $anchor = $(this);
    //     $('html, body').stop().animate({
    //       scrollTop: $($anchor.attr('href')).offset().top - 102
    //     }, 1500,'easeInOutExpo');
    //     /*
    //     if you don't want to use the easing effects:
    //     $('html, body').stop().animate({
    //       scrollTop: $($anchor.attr('href')).offset().top
    //     }, 1000);
    //     */
    //     event.preventDefault();
    //   });
    // })


})(jQuery);