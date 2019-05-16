<body>
  <div id="map"></div>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
   <script>
    map = new OpenLayers.Map("map");
    map.addLayer(new OpenLayers.Layer.OSM());

    var lonLat = new OpenLayers.LonLat(44.5234862, 40.1860371)
          .transform(
            new OpenLayers.Projection("EPSG:4326"),
            map.getProjectionObject()
          );
          
    var zoom=17;

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    var size = new OpenLayers.Size(30,30);
var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
var icon = new OpenLayers.Icon('icon.png', size, offset);

    markers.addMarker(new OpenLayers.Marker(lonLat,icon));
    map.setCenter (lonLat, zoom);


   markers.events.register("click", markers, function(e){
   	popup = new OpenLayers.Popup("loc",
                   map.getLonLatFromPixel(e.xy),
                   new OpenLayers.Size(200,200),
     
             		"<div class='mec'>"+lonLat+"text"+"</div>",
                   true);
    map.addPopup(popup);


        });

  </script>
</body></html>