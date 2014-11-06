(function($) {
    $(document).ready(function(e) {
        $('#main-menu').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false
        });
    });
})(jQuery);