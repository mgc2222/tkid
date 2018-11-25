(function( $ ){
    $.fn.anchorAnimate = function(settings, scrolltarget) {
        settings = jQuery.extend({
            speed : 1100
        }, settings);

        return this.each(function(){
            var caller = this;
            $(caller).off('click.dtbaker_insert_page').on('click.dtbaker_insert_page',function (event) {
                event.preventDefault();
                var locationHref = window.location.href;
                var elementClick = $(caller).attr("href");

                var destination = scrolltarget ? scrolltarget.offset().top - 100 : $(elementClick).offset().top;
                $("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, settings.speed, function() {
                    if(!scrolltarget){
                        window.location.hash = elementClick
                    }
                });
                return false;
            });
        })
    };

    $(document).ready(function() {
        $('.dtbaker_insert_page').each(function(){
            // find any main menu links that go to this page.
            // redirect them to this inserted content rather than the actual link.
            var block_id = $(this).attr('id');
            var page_id = $(this).data('insert-page');
            $('.menu-item-for-page-'+page_id).anchorAnimate({},$(this));
        });
    });

})( jQuery );


