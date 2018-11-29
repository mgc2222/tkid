<?php
/**
 * Created by PhpStorm.
 * User: Cristi
 * Date: 11/28/2018
 * Time: 10:20 AM
 */
?>
<section data-id="dkdnqry" class="elementor-element elementor-element-dkdnqry elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;shape_divider_top&quot;:&quot;&quot;,&quot;shape_divider_bottom&quot;:&quot;&quot;}" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-row">
            <div data-id="zlhshcc" class="elementor-element elementor-element-zlhshcc elementor-column elementor-top-column" data-settings="[]" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div data-id="jetgboh" class="elementor-element elementor-element-jetgboh dtb-heading-line elementor-widget elementor-widget-heading" data-settings="[]" data-element_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-large page-section" id="section-events">
                                    <?php echo $trans['events.section_title'];?>
                                </h2>
                            </div>
                        </div>
                        <div data-id="" class="elementor-element elementor-element-mewjspa elementor-widget elementor-widget-text-editor" data-settings="[]" data-element_type="text-editor.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-text-editor elementor-clearfix">
                                    <p>A garden is a planned space, usually outdoors, set aside for the display, cultivation and enjoyment of plants and other forms of nature. The garden can incorporate both natural and man-made materials. The most common form today is known as a residential garden, but the term garden has traditionally been a more general one. </p>
                                </div>
                            </div>
                        </div>
                        <div data-id="zqydquk" class="elementor-element elementor-element-zqydquk elementor-widget elementor-widget-dtbaker_blog_posts" data-settings="[]" data-element_type="dtbaker_blog_posts.default">
                            <div class="elementor-widget-container">
                                <div class="blog_posts blog_posts_1" data-columns="1" data-output="summary">
                                    <div id="the-loop" class="dtbaker-blog-posts">
                                        <!-- Template Section Start: content -->
                                        <!-- Template Section Start: template-parts/content -->
                                        <!-- Template Section Start: template-parts/content-summary -->
                                        <!-- foliageblog template: content-summary -->
                            <?php
                                if ($dataView->events->rows != null)
                                {
                                $index = 1;
                                    foreach ($dataView->events->rows as &$row)
                                    {
                                //echo $row->image_caption;
                            ?>
                                        <article id="event-<?php echo $row->id;?>" class="blog blog-summary post type-post status-publish format-standard has-post-thumbnail hentry category-life category-photography tag-saving-money tag-travel">
                                            <div class="blog-image">
                                                <!-- Template Section Start: template-parts/blog-widget -->
                                                <div class="blog-widget">
                                                    <div class="blog-widget-inner">
                                                        <a href="2017-01-11-how-to-save-money-while-travelling.html" class="blog_date">
                                                            <span class="day">11</span> <span class="month">Jan</span> <span class="year">2017</span>
                                                            <div></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- Template Section End: template-parts/blog-widget -->
                                                <div class="dtbaker_photo_border">
                                                    <div>
                                                        <a href="2017-01-11-how-to-save-money-while-travelling.html" rel="bookmark">
                                                            <img width="800" height="410" src="images/content/thumbs/photo-1470163395405-d2b80e7450ed-800x410.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <header class="entry-header">
                                                <div class="blog-title">
                                                    <h2 class="entry-title">
                                                        <a href="2017-01-11-how-to-save-money-while-travelling.html" rel="bookmark">How to save money while travelling</a>
                                                    </h2>
                                                </div>
                                            </header>
                                            <!-- .entry-header -->
                                            <div class="blog-entry-content">
                                                <p>Who doesn’t like saving money especially when you are travelling on vacations. There are various aspects and expenses related to travelling when you travel out from your city whether it is on personal vacations or any business tours. From flight bookings to room bookings and from food bookings to cab bookings all are expenses and part of your travel plan. It is always advisable to plan your travel well in[&hellip;]</p>
                                            </div>
                                            <!-- .entry-content -->
                                            <footer class="entry-footer">
                                                <div class="blog_links">
                                                    <span class="the-date"> <i class="fa fa-calendar"></i> <a href="2017-01-11-how-to-save-money-while-travelling.html" title="5:38 am" rel="bookmark">January 11, 2017</a> </span>
                                                    <span class="blog_links_sep">/</span>
                                                    <span class="by-author">
                                                        <i class="fa fa-user"></i>
                                                        <span class="author vcard"><a class="url fn n" href="#" title="View all posts by admin" rel="author">admin</a></span>
                                                    </span>
                                                    <span class="blog_links_sep">/</span>
                                                    <span class="comment-wrap">
                                                        <a href="2017-01-11-how-to-save-money-while-travelling.html">
                                                            <span class="leave-comment"><i class="fa fa-comment-o"></i> 0 Comments</span>
                                                        </a>
                                                    </span>
                                                    <span class="blog_links_sep">/</span>
                                                    <span class="entry-utility-prep entry-utility-prep-cat-links"><i class="fa fa-files-o"></i> <a href="category-life.html" rel="category tag">Life</a>, <a href="category-photography.html" rel="category tag">Photography</a></span>
                                                    <span class="blog_links_sep">/</span>
                                                    <span class="entry-utility-prep entry-utility-prep-tag-links"><i class="fa fa-tags"></i> <a href="#" rel="tag">Saving Money</a>, <a href="#" rel="tag">travel</a></span>
                                                </div>
                                            </footer>
                                            <!-- .entry-footer -->
                                        </article>
                                        <?php
                                        $index++;
                                    }
                                }
                            ?>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
