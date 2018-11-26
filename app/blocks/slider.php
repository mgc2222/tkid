<?php if (!isset($webpage)) die('Direct access not allowed');  ?>
<!--Start Banner-->

<section data-id="7ck00n0" class="elementor-element elementor-element-7ck00n0 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;shape_divider_top&quot;:&quot;&quot;,&quot;shape_divider_bottom&quot;:&quot;&quot;}" data-element_type="section">
	<div class="elementor-container elementor-column-gap-default">
		<div class="elementor-row">
			<div data-id="pey0qh8" class="elementor-element elementor-element-pey0qh8 elementor-column elementor-col-100 elementor-top-column" data-settings="[]" data-element_type="column">
				<div class="elementor-column-wrap elementor-element-populated">
					<div class="elementor-widget-wrap">
						<div data-id="r8ff6st" class="elementor-element elementor-element-r8ff6st foliageblog-slider-normal foliageblog-slider-labels-none elementor-widget elementor-widget-image-carousel" data-settings="[]" data-element_type="image-carousel.default">
							<div class="elementor-widget-container">
								<div class="elementor-image-carousel-wrapper elementor-slick-slider" dir="ltr">
									<div class="elementor-image-carousel slick-arrows-inside slick-dots-outside" data-slider_options='{&quot;slidesToShow&quot;:3,&quot;autoplaySpeed&quot;:5000,&quot;autoplay&quot;:true,&quot;infinite&quot;:true,&quot;pauseOnHover&quot;:true,&quot;speed&quot;:500,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;rtl&quot;:false,&quot;slidesToScroll&quot;:2}'>
                            <?php 
                                if ($dataView->slider->rows != null)
                                {
                                    $index = 1;
                                    foreach ($dataView->slider->rows as &$row)
                                    {
                                        //echo $row->image_caption;
                            ?>
                                        <div class="slick-slide">
                                            <figure class="slick-slide-inner">
                                                <div class="foliageblog-slider-caption">
                                                    <div class="inner-content-width">
                                                        <div>
                                                            <h3>
                                                                <?php echo $row->image_caption;?>
                                                            </h3>
                                                            <div><?php echo $row->image_description?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img class="slick-slide-image" src="<?php echo $row->imagePath?>" alt="<?php echo $row->image_alt?>" />
                                                <figcaption class="elementor-image-carousel-caption"></figcaption>
                                            </figure>
                                        </div>
                            <?php
                                        $index++; 
                                    }
                                }
                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
