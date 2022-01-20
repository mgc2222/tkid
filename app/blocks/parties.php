<?php if (!isset($webpage)) die('Direct access not allowed');  ?>
<article id="post-10" class="post-10 page type-page status-publish hentry mhmm">
	<header class="entry-header">
        <h2 class="elementor-heading-title elementor-size-large entry-title" id="section-parties">
            <?php echo $trans['parties.section_title'];?>
		</h2>
	</header>
	<!-- .entry-header -->
	<div class="entry-content">
		<div class="elementor elementor-10">
			<div class="elementor-inner">
				<div class="elementor-section-wrap">
					<section data-id="uoadoby" class="elementor-element elementor-element-uoadoby elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;shape_divider_top&quot;:&quot;&quot;,&quot;shape_divider_bottom&quot;:&quot;&quot;}" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
							<div class="<!--elementor-row-->" style="width:100%">
								<div data-id="hq9bqgp" class="elementor-element elementor-element-hq9bqgp elementor-column <?php if (false) echo 'elementor-col-66'?> elementor-top-column" data-settings="[]" data-element_type="column">
									<div class="<!--elementor-column-wrap--> elementor-element-populated">
										<div class="elementor-widget-wrap">
											<div data-id="p13nvpq" class="elementor-element elementor-element-p13nvpq elementor-widget elementor-widget-text-editor" data-settings="[]" data-element_type="text-editor.default">
												<div class="elementor-widget-container">
													<div class="elementor-text-editor elementor-clearfix">
                                                        <?php $arrContentParties = (isset($transJson['category_id_'.$dataView->categoryContentPartiesId])) ? $transJson['category_id_'.$dataView->categoryContentPartiesId] : [] ;?>
                                                        <?php echo (isset($arrContentParties['html'])) ? $arrContentParties['html'] : '';?>
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
