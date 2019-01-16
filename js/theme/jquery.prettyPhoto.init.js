!function(a) {
    a(function() {
            var markup =
                '<div class="pp_pic_holder">' +
                '   <div class="ppt hidden" style="margin:0">&nbsp;</div>' +
                '   <div class="pp_top">' +
                '      <div class="pp_left"></div>' +
                '      <div class="pp_middle"></div>' +
                '      <div class="pp_right"></div>' +
                '   </div>' +
                '   <div class="pp_content_container">' +
                '       <div class="pp_left">' +
                '           <div class="pp_right">' +
                '               <div class="pp_content">' +
                '                   <div class="pp_loaderIcon"></div>' +
                '                   <div class="pp_fade">' +
                '                       <a href="#" class="pp_expand" title="Expand the image">Expand</a>' +
                '                       <div class="pp_hoverContainer">' +
                '                           <a class="pp_next" href="#">next</a>' +
                '                           <a class="pp_previous" href="#">previous</a>' +
                '                       </div>' +
                '                       <div id="pp_full_res"></div>' +
                '                       <div class="pp_details">' +
                '                           <div class="pp_nav">' +
                '                               <a href="#" class="pp_arrow_previous">Previous</a>' +
                '                               <p class="currentTextHolder">0/0</p>' +
                '                               <a href="#" class="pp_arrow_next">Next</a>' +
                '                           </div>' +
                '                           <p class="pp_description hidden"></p>' +
                '                       {pp_social}' +
                '                       <a class="pp_close" href="#">Close</a>' +
                '                       </div>' +
                '                   </div>' +
                '               </div>' +
                '           </div>' +
                '       </div>' +
                '   </div>' +
                '   <div class="pp_bottom">' +
                '       <div class="pp_left"></div>' +
                '       <div class="pp_middle"></div>' +
                '       <div class="pp_right"></div>' +
                '   </div>' +
                '</div>' +
                '<div class="pp_overlay"></div>';
            /*var gallery_markup =
                '<div class="pp_gallery">' +
                '   <a href="#" class="pp_arrow_previous">Previous</a>' +
                '   <a href="#" class="pp_arrow_next">Next</a>' +
                '</div>';*/

            a("a.zoom").prettyPhoto( {
                    hook: "data-rel", social_tools: !1, theme: "pp_woocommerce", horizontal_padding: 20, opacity: .8, deeplinking: !1, //markup: markup, //gallery_markup: gallery_markup, //show_title: false,
                }
            ), a("a[data-rel^='prettyPhoto']").prettyPhoto( {
                    hook: "data-rel", social_tools: !1, theme: "pp_woocommerce", horizontal_padding: 20, opacity: .8, deeplinking: !1, markup: markup, //show_title: false, //gallery_markup: gallery_markup,
                }
            )
        }
    )
}

(jQuery);