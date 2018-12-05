<?php
/**
 * Created by PhpStorm.
 * User: Cristi
 * Date: 11/27/2018
 * Time: 2:04 PM
 */
?>
<section data-id="ndaqmty" class="elementor-element elementor-element-ndaqmty elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;shape_divider_top&quot;:&quot;&quot;,&quot;shape_divider_bottom&quot;:&quot;&quot;}" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-row">
            <div data-id="yfzeqiw" class="elementor-element elementor-element-yfzeqiw elementor-column elementor-col-100 elementor-top-column" data-settings="[]" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div data-id="wxuopus" class="elementor-element elementor-element-wxuopus dtb-heading-none elementor-widget elementor-widget-heading p0" data-settings="[]" data-element_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-large talign-center page-section" id="section-contact">
                                    <?php echo $trans['location.section_title'].':';?>
                                </h2>
                                <h6 class="elementor-heading-title talign-center">
                                    <?php echo $trans['location.section_content'];?>
                                </h6>
                            </div>
                        </div>
                        <div data-id="hpollqw" class="elementor-element elementor-element-hpollqw elementor-widget elementor-widget-dtbaker-google-map p0" data-settings="[]" data-element_type="dtbaker-google-map.default">
                            <div class="elementor-widget-container p0">
                                <div id="googlemap1" class="googlemap" style="height:400px;">
                                    <?php if(false){?>
                                    <!--<iframe  style="border:0;height:100%;width:100%" src="https://www.google.com/maps/embed/v1/place?key=<?php /*echo _GOOGLE_API_KEY;*/?>&q=Drumul+Vârful+Berivoiul+Mare+72a+București+Sector+1&zoom=15" allowfullscreen></iframe>-->
                                    <?php }?>
                                </div>
                                <div class="clear"></div>
                                <?php if(false){?>
                                <div class="map_buttons">
                                    <a href="https://maps.google.com/maps?q=Melbourne%2C+Australia" class="dtbaker_button" target="_blank" rel=”noreferrer noopener”>Enlarge Map</a>
                                    <a href="https://maps.google.com?daddr=Melbourne%2C+Australia" class="dtbaker_button" target="_blank" rel=”noreferrer noopener”>Get Directions</a>
                                </div>
                                <script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3&libraries=places&key=<?php echo _GOOGLE_API_KEY;?>&callback=initMap" async defer></script>
                                <script type="text/javascript"> (function ($) { var geocoder; var map; var query = "Drumul Vârful Berivoiul Mare 72a București Sector 1"; function initialize() { if(typeof google == 'undefined')return; geocoder = new google.maps.Geocoder(); var myOptions = { zoom: 15, scrollwheel: false, styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":60}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"lightness":30},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ef8c25"},{"lightness":40}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#b6c54c"},{"lightness":40},{"saturation":-40}]}], disableDefaultUI: true, mapTypeId: google.maps.MapTypeId.ROADMAP }; map = new google.maps.Map(document.getElementById("googlemap1"), myOptions); codeAddress(); } function codeAddress() { var address = query; geocoder.geocode({'address': address}, function (results, status) { if (status == google.maps.GeocoderStatus.OK) { var marker = new google.maps.Marker({ map: map, position: results[0].geometry.location }); map.setCenter(marker.getPosition()); setTimeout(function () { map.panBy(0, -50); }, 10); } else { alert("Geocode was not successful for the following reason: " + status); } }); } $(function () { initialize(); }); }(jQuery)); </script>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
