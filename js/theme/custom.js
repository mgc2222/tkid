<!-- Back to Top -->
$(document).ready(function($) {
// browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
//duration of the top scrolling animation (in ms)
        scroll_top_duration = 1400,
//grab the "back to top" link
        $back_to_top = $('.cd-top');

//hide or show the "back to top" link
    $(window).scroll(function () {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    var popOverSettings = {
        placement: 'top',
        container: 'body',
        //html: true,
        //trigger: 'manual',
        selector: '[data-toggle="popover"]', //Specify the selector here
        /*content: function () {
            return $('#popover-content').html();
        }*/
    };

    $('#calendar').popover(popOverSettings);

    $('body').on('click', function (e) {
        $('.tooltip').remove();

        if($(e.target).closest('.popover').length){
            e.stopImmediatePropagation();
            return false;
        }
        else{
            var calendarCell = $('.calendar-event');
            var popovers = $('.popover');
            if (calendarCell.has(e.target).length === 0 && !calendarCell.is(e.target) && popovers.length) {
                $('[data-toggle="popover"]').popover('destroy');
                popovers.remove();
            }
        }
    });

});