$(document).ready(function() {
    var refs = $('a.cal-event-week');
    var popups = $('.cal-event-description');

    $(document).on('click touchend', function (e) {
        var target = $(e.target);
        // we need to reshow and recreate popper when click over popup so return;

        if (target.hasClass('cal-event-week')) {

            e.preventDefault();
            var eventId = target.attr("data-event-id");
            var ref = target;
            var popup = $('#event-description-' + eventId);
            popup.removeClass('hidden').show();

            var popper = new Popper(ref, popup, {
                placement: 'bottom',
            });
            debugger;
        } else {
            popups.addClass('hidden').hide();
            debugger;
        }
    });
});