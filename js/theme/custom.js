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

    $(".gallery-item a[rel^='prettyPhoto[gallery]']").prettyPhoto({
        animation_speed:'normal',
        //overlay_gallery: true,
        show_title: false,
        default_width: 'auto',
        default_height: 'auto',
        //social_tools: false,

        markup: '<div class="pp_pic_holder">' +

						'<div class="pp_top">' +
							'<div class="pp_left"></div>' +
							'<div class="pp_middle"></div>' +
							'<div class="pp_right"></div>' +
						'</div>' +
						'<div class="pp_content_container">' +
							'<div class="pp_left">' +
							'<div class="pp_right">' +
								'<div class="pp_content">' +
									'<div class="pp_loaderIcon"></div>' +
									'<div class="pp_fade">' +
										'<a href="#" class="pp_expand" title="Expand the image">Expand</a>' +
										'<div class="pp_hoverContainer">' +
											'<a class="pp_next" href="#">next</a>' +
											'<a class="pp_previous" href="#">previous</a>' +
										'</div>' +
										'<div id="pp_full_res"></div>' +
										'<div class="pp_details">' +
											'<div class="pp_nav">' +
												'<a href="#" class="pp_arrow_previous">Previous</a>' +
												'<p class="currentTextHolder">0/0</p>' +
												'<a href="#" class="pp_arrow_next">Next</a>' +
											'</div>' +
											'<p class="pp_description"></p>' +
											'{pp_social}' +
											'<a class="pp_close" href="#">Close</a>' +
										'</div>' +
									'</div>' +
								'</div>' +
							'</div>' +
							'</div>' +
						'</div>' +
						'<div class="pp_bottom">' +
							'<div class="pp_left"></div>' +
							'<div class="pp_middle"></div>' +
							'<div class="pp_right"></div>' +
						'</div>' +
					'</div>' +
					'<div class="pp_overlay"></div>',
        gallery_markup: '<div class="pp_gallery">' +
								'<a href="#" class="pp_arrow_previous">Previous</a>' +
								'<a href="#" class="pp_arrow_next">Next</a>' +
							'</div>',
    });


});