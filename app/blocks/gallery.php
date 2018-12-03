<?php
/**
 * Created by PhpStorm.
 * User: Cristi
 * Date: 11/27/2018
 * Time: 4:11 PM
 */
?>
<article id="post-16" class="post-16 page type-page status-publish hentry">
    <header class="entry-header">
        <h2 class="elementor-heading-title elementor-size-large entry-title page-section" id="section-gallery">
            <?php echo $trans['gallery.section_title'];?>
        </h2>
    </header>
    <!-- .entry-header -->
    <div class="entry-content">
        <div class="elementor elementor-16">
            <div class="elementor-inner">
                <div class="elementor-section-wrap">
                    <?php if(false){ ?>
                    <section data-id="ggqzlbn" class="elementor-element elementor-element-ggqzlbn elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;shape_divider_top&quot;:&quot;&quot;,&quot;shape_divider_bottom&quot;:&quot;&quot;}" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div data-id="78tke55" class="elementor-element elementor-element-78tke55 elementor-column elementor-col-100 elementor-top-column" data-settings="[]" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div data-id="r5p4tyy" class="elementor-element elementor-element-r5p4tyy elementor-widget elementor-widget-text-editor" data-settings="[]" data-element_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-text-editor elementor-clearfix">
                                                        <p>Examples of the different photo galleries available.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php } ?>
                    <section data-id="fvoruiy" class="elementor-element elementor-element-fvoruiy elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;shape_divider_top&quot;:&quot;&quot;,&quot;shape_divider_bottom&quot;:&quot;&quot;}" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div data-id="1af8f09" class="elementor-element elementor-element-1af8f09 elementor-column elementor-col-100 elementor-top-column" data-settings="[]" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div data-id="9lm3f76" class="elementor-element elementor-element-9lm3f76 elementor-widget elementor-widget-image-gallery" data-settings="[]" data-element_type="image-gallery.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-image-gallery">
                                                        <div id='gallery-1' class='gallery galleryid-16 gallery-columns-3 gallery-size-medium'>
                                                <?php
                                                    if ($dataView->gallery->rows != null)
                                                    {
                                                    $index = 1;
                                                        foreach ($dataView->gallery->rows as &$row)
                                                        {
                                                    //echo $row->image_caption;
                                                ?>
                                                            <figure class='gallery-item'>
                                                                <div class='gallery-icon landscape'>
                                                                    <a href='<?php echo $row->imagePath /*$row->thumb_gallery*/?>' data-rel="prettyPhoto[gallery]">
                                                                        <img
                                                                            width="300" height="200"
                                                                            src="<?php echo /*$row->imagePath*/ $row->thumb_gallery?>"
                                                                            class="attachment-medium size-medium"
                                                                            alt="<?php echo $row->image_alt?>"
                                                                            style="object-fit:cover; min-height: 200px; max-height: 200px"
                                                                            aria-describedby="gallery-1-<?php echo $row->id;?>"
                                                                        />
                                                                    </a>
                                                                </div>
                                                                <figcaption class='wp-caption-text gallery-caption' id='gallery-1-<?php echo $row->id;?>'><?php echo $row->image_caption?></figcaption>
                                                            </figure>

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
                </div>
            </div>
        </div>
    </div>
    <!-- .entry-content -->
</article>
