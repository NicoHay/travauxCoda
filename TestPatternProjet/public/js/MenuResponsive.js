(function($) {

    $('#bigmac').click(function(e) {

        e.preventDefault();
        $('body').toggleClass('sidebar');
    })

})(jQuery);
