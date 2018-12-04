//google.maps.event.addDomListener(window, 'load', init);
  var map;
  function initMap() {
        var mapOptions = {
            center: new google.maps.LatLng(latitude,longitude),
            zoom: 15,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
            },
            disableDoubleClickZoom: true,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            },
            scaleControl: true,
            scrollwheel: true,
            panControl: true,
            streetViewControl: true,
            draggable : true,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: false,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        }
        var mapElement = document.getElementById('googlemap1');
        var map = new google.maps.Map(mapElement, mapOptions);
        var locations = [
    ['The Kid', 'Varful Berivoiul Mare, nr 72A, Bucharest, Romania', phone, 'contact@tkid.ro', 'www.tkid.ro', latitude, longitude, 'http://wahabali.com/themeforest_images/pearl-map.png']
        ];
        for (i = 0; i < locations.length; i++) {
      if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
      if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
      if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
            if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
            if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
            marker = new google.maps.Marker({
                icon: markericon,
                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
                map: map,
                title: locations[i][0],
                desc: description,
                tel: telephone,
                email: email,
                web: web
            });
      link = '';
      bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);
     }
    function bindInfoWindow(marker, map, title, desc, telephone, email, web, link) {
      var infoWindowVisible = (function () {
            var currentlyVisible = false;
            return function (visible) {
               if (visible !== undefined) {
                      currentlyVisible = visible;
                }
                return currentlyVisible;
            };
    }());
     iw = new google.maps.InfoWindow();
     google.maps.event.addListener(marker, 'click', function() {
         if (infoWindowVisible()) {
             iw.close();
             infoWindowVisible(false);
         } else {
             var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4><p>"+desc+"</p><a href='tel:"+telephone+"' ><p>"+telephone+"</p></a><a href='mailto:"+email+"' >"+email+"</a></div>";
             iw = new google.maps.InfoWindow({content:html});
             iw.open(map,marker);
             infoWindowVisible(true);
         }
      });
    google.maps.event.addListener(iw, 'closeclick', function () {
      infoWindowVisible(false);
    });


  }
  google.maps.event.addListener(map, 'idle', function() {
      // Prevents card from being added more than once (i.e. when page is resized and google maps re-renders)
      if ( $( ".place-card" ).length === 0  ) {
          $(".gm-style").append(content);
      }
  });
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
      '                        <a target="_blank" jstcache="53" href="https://maps.google.com/maps?ll='+latitude+','+longitude+'&amp;z=15&amp;daddr=Drumul%20V%C3%A2rful%20Berivoiul%20Mare%20Bucure%C8%99ti@44.5182825,26.0433924" class="navigate-link">\n' +
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
      '                <div jstcache="45" class="saved-from-source-link" style="display:none"></div>\n' +
      '                <div class="bottom-actions">\n' +
      '                    <div class="google-maps-link"> <a target="_blank" jstcache="46" href="https://maps.google.com/maps?ll='+latitude+','+longitude+'&amp;z=15&amp;q=Drumul%20V%C3%A2rful%20Berivoiul%20Mare%20Bucure%C8%99ti" jsaction="mouseup:placeCard.largerMap">View larger map</a> </div>\n' +
      '                    <a target="_blank" jstcache="47" class="send-to-device-button" style="display:none"></a>\n' +
      '                </div>\n' +
      '            </div>\n' +
      '        </div>\n' +
      '    </div>\n' +
      '</div>';
}