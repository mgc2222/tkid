jQuery(document).ready(function(){
    if(jQuery().slick) {
        jQuery('.dtbaker_woocommerce_product_slider').each(function(){
            var slider_options = {
                variableWidth: !!jQuery(this).data('variablewidth'),
                infinite: !!jQuery(this).data('infinite'),
                slidesToShow: jQuery(this).data('columns'),
                slidesToScroll: 1,
                dots: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: Math.min( parseInt(jQuery(this).data('columns')), 2)
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            };
            // console.log(slider_options);
            jQuery(this).slick(slider_options);
        });
    }
});