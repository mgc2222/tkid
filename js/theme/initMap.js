function initMap() {
    var options = {
        center: {lat: -34.397, lng: 150.644},
        zoom: 15
    };
    map = new google.maps.Map(document.getElementById('googlemap1'), options);
    google.maps.event.addListener(map, 'idle', function() {
        // Prevents card from being added more than once (i.e. when page is resized and google maps re-renders)
        console.log('map loading');
        if ( $( ".place-card" ).length === 0  ) {
            $(".gm-style").append(content);
        }
    });
}

/*
(function ($) { var geocoder; var map; var query = "Drumul Vârful Berivoiul Mare 72a București Sector 1"; function initialize() { if(typeof google == 'undefined')return; geocoder = new google.maps.Geocoder(); var myOptions = { zoom: 15, scrollwheel: false, styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":60}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"lightness":30},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ef8c25"},{"lightness":40}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#b6c54c"},{"lightness":40},{"saturation":-40}]}], disableDefaultUI: true, mapTypeId: google.maps.MapTypeId.ROADMAP }; map = new google.maps.Map(document.getElementById("googlemap1"), myOptions); codeAddress(); } function codeAddress() { var address = query; geocoder.geocode({'address': address}, function (results, status) { if (status == google.maps.GeocoderStatus.OK) { var marker = new google.maps.Marker({ map: map, position: results[0].geometry.location }); map.setCenter(marker.getPosition()); setTimeout(function () { map.panBy(0, -50); }, 10); } else { alert("Geocode was not successful for the following reason: " + status); } }); } $(function () { initialize(); }); }(jQuery))*/

var content = '<div style="position: absolute; left: 0px; top: 100px;">\n' +
'    <div style="background-color: white; margin: 10px; padding: 1px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;">\n' +
'        <div jstcache="0" style="">\n' +
'            <div jstcache="119" class="place-card place-card-large">\n' +
'                <div class="place-desc-large">\n' +
'                    <div jstcache="36" class="place-name" jsan="7.place-name">Drumul Vârful Berivoiul Mare</div>\n' +
'                    <div jstcache="37" class="address" jsan="7.address">Bucharest</div>\n' +
'                </div>\n' +
'                <div jstcache="38" class="navigate">\n' +
'                    <div jsaction="placeCard.directions" class="navigate">\n' +
'                        <a target="_blank" jstcache="53" href="https://maps.google.com/maps?ll=44.518283,26.043392&amp;z=15&amp;t=m&amp;hl=en&amp;gl=US&amp;mapclient=embed&amp;daddr=Drumul%20V%C3%A2rful%20Berivoiul%20Mare%20Bucure%C8%99ti@44.5182825,26.0433924" class="navigate-link">\n' +
'                            <div class="icon navigate-icon"></div>\n' +
'                            <div jstcache="54" class="navigate-text">Directions</div>\n' +
'                        </a>\n' +
'                    </div>\n' +
'                    <div class="tooltip-anchor">\n' +
'                        <div class="tooltip-tip-outer"></div>\n' +
'                        <div class="tooltip-tip-inner"></div>\n' +
'                        <div class="tooltip-content">\n' +
'                            <div jstcache="55">Get directions to this location on Google Maps.</div>\n' +
'                        </div>\n' +
'                    </div>\n' +
'                </div>\n' +
'                <div jstcache="41" class="review-box">\n' +
'                    <div jstcache="42" class="" style="display:none"></div>\n' +
'                    <div jstcache="43" jsinstance="0" class="" style="display:none"></div>\n' +
'                    <div jstcache="43" jsinstance="1" class="" style="display:none"></div>\n' +
'                    <div jstcache="43" jsinstance="2" class="" style="display:none"></div>\n' +
'                    <div jstcache="43" jsinstance="3" class="" style="display:none"></div>\n' +
'                    <div jstcache="43" jsinstance="*4" class="" style="display:none"></div>\n' +
'                    <a jstcache="44" class="" style="display:none"></a>\n' +
'                </div>\n' +
'                <div jstcache="45" class="saved-from-source-link" style="display:none"></div>\n' +
'                <div class="bottom-actions">\n' +
'                    <div class="google-maps-link"> <a target="_blank" jstcache="46" href="https://maps.google.com/maps?ll=44.518283,26.043392&amp;z=15&amp;t=m&amp;hl=en&amp;gl=US&amp;mapclient=embed&amp;q=Drumul%20V%C3%A2rful%20Berivoiul%20Mare%20Bucure%C8%99ti" jsaction="mouseup:placeCard.largerMap">View larger map</a> </div>\n' +
'                    <a target="_blank" jstcache="47" class="send-to-device-button" style="display:none"></a>\n' +
'                </div>\n' +
'            </div>\n' +
'        </div>\n' +
'    </div>\n' +
'</div>';
