<?php if (!isset($webpage)) die('Direct access not allowed');  ?>
<!--Start Banner-->
<section data-id="t1s774a" class="elementor-element elementor-element-t1s774a elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;shape_divider_top&quot;:&quot;&quot;,&quot;shape_divider_bottom&quot;:&quot;&quot;}" data-element_type="section">
	<div class="elementor-container elementor-column-gap-default">
		<div class="elementor-row">
			<div data-id="kgb2xsf" class="elementor-element elementor-element-kgb2xsf elementor-column elementor-col-100 elementor-top-column" data-settings="[]" data-element_type="column">
				<div class="elementor-column-wrap elementor-element-populated">
					<div class="elementor-widget-wrap">
						<div data-id="czukrvy" class="elementor-element elementor-element-czukrvy foliageblog-slider-pretty foliageblog-slider-labels-labels elementor-widget elementor-widget-image-carousel" data-settings="[]" data-element_type="image-carousel.default">
							<div class="elementor-widget-container">
								<div class="elementor-image-carousel-wrapper elementor-slick-slider" dir="ltr">
									<div class="elementor-image-carousel slick-image-stretch" data-slider_options='{&quot;slidesToShow&quot;:1,&quot;autoplaySpeed&quot;:5000,&quot;autoplay&quot;:true,&quot;infinite&quot;:true,&quot;pauseOnHover&quot;:true,&quot;speed&quot;:500,&quot;arrows&quot;:false,&quot;dots&quot;:false,&quot;rtl&quot;:false,&quot;fade&quot;:false}'>
                            <?php 
                                if ($dataView->slider != null)
                                {
                                    $index = 0;

                                    foreach ($dataView->slider as &$row)
                                    {
                                        //echo $row->image_caption;
                            ?>
                                        <div class="slick-slide">
                                            <figure class="slick-slide-inner" id="slick-slide0<?php echo $index?>">
                                                <div class="foliageblog-slider-caption">
                                                    <div class="inner-content-width">
                                                        <div>
                                                            <h3 class="quotes">
                                                                <?php /*echo $row->image_caption;*/?>
                                                                <?php echo (!empty($trans[$row->image_caption]))? $trans[$row->image_caption]:((!empty($row->image_description))? $row->image_description : '');?>
                                                            </h3>
                                                            <div>
                                                                <?php /*echo $row->image_description*/?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img class="slick-slide-image" src="<?php echo $row->thumb_slider/*$row->imagePath*/?>" alt="<?php echo (!empty($trans[$row->image_alt])) ?$trans[$row->image_alt]:((!empty($row->image_alt))? $row->image_alt :'image_alt') ;?>" title="<?php echo (!empty($trans[$row->image_title])) ? $trans[$row->image_title]:((!empty($row->image_title))? $row->image_title:'image_title') ;?>"/>
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
