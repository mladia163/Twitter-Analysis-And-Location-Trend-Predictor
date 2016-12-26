
<!DOCTYPE html>
<html>
  <head>
    <title>Bounding Box Tool: Metadata Enrichment for Catalogue Records by Visually Selecting Geographic Coordinates (Latitude / Longitude) for Maps</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="index.css" type="text/css" media="screen" charset="utf-8">
    <script src="http://maps.googleapis.com/maps/api/js?v=3.20&libraries=drawing&sensor=false"></script>
    <script src="zc/v2.2.0/ZeroClipboard.min.js"></script>
    <script src="index.js"></script>
  </head>
  <body onload="new BoundingBox">
    <!-- welcome box, currently not used -->
    <div id="lightbox">
      <div id="welcome">
        <h1>Bounding Box Tool for Metadata Enrichment</h1>
        <h2>Visual selection of the latitude / longitude coordinates for geotagging of a bibliographic record for cartographic documents</h2>
        Catalogue records enriched with location are ready for geo-search using <a href="http://www.mapranksearch.com/">MapRank Search</a>.
        Enrichment is possible also with <a href="http://www.klokantech.com/georeferencer/">Georeferencer</a> or <a href="http://www.klokantech.com/geoparser/">Geoparser</a>.
        <a id="welcome-continue" href="/">Continue to the tool...</a>
        <a id="welcome-close" href="/">Close</a>
      </div>
    </div>

    <div id="header">
      <a href="/" id="header-logo"></a>
    </div>
    <div id="texts">
      <a href="http://www.georeferencer.com/">Georeferencer</a> | <a href="http://www.mapranksearch.com/">MapRank Search</a> | <a href="http://www.oldmapsonline.org/">Old Maps Online</a>
    </div>
    <div id="panel">
      <div id="leftbox">
        <b>Copy &amp; Paste</b><br/>
        <select id="formatting" name="format">
          <option value="marc" selected>MARC</option>
          <option value="aleph">MARC Aleph</option>
          <option value="vtls">MARC VTLS</option>
          <option value="oclc">MARC OCLC</option>
          <option value="oclcdec">MARC OCLC DEC</option>
          <option value="kpsys">MARC KP-SYS</option>
          <option value="archives">Archives</option>
          <option value="dublincore">DublinCore</option>
          <option value="kml">KML</option>
          <option value="geojson">GEOJSON</option>
          <option value="wkt">OGC WKT</option>
          <option value="csv">CSV</option>
          <option value="raw">CSV RAW</option>
          <option value="iso19139">ISO 19139</option>
          <option value="fgdc">FGDC</option>
        </select>
      </div>
      <div id="formatted"></div>
    </div>
    <form id="geocoderform" action="#">
      <input type="search" placeholder="Find a place with OpenStreetMap ..." autocomplete="off" id="geocoder-nominatim"></input>
      <input type="search" placeholder="Find a place with Google ..." autocomplete="off" id="geocoder-google"></input>
      <input type="submit" id="geocodersubmit"></input>
    </form>
    <div id="map"></div>
    <div id="map-plus">+</div>
    <div id="map-minus">-</div>
    <div id="map-select">L</div>
    <select id="mapType">
      <option value="mqosm">OSM MapQuest</option>
      <option value="osm">OSM</option>
      <option value="http://api.tiles.mapbox.com/v3/klokantech.icij6jpi.jsonp">MapBox Streets</option>
      <option value="http://api.tiles.mapbox.com/v3/klokantech.iciigjd2.jsonp">MapBox Satellite</option>
      <option value="gmaps-roadmap">Google Streets</option>
      <option value="gmaps-satellite">Google Satellite</option>
      <option value="gmaps-hybrid">Google Hybrid</option>
      <option value="gmaps-terrain">Google Terrain</option>
    </select>
    <input type="button" id="worldbutton" value="World" />
    <div id="footer">
      Copyright &copy; 2015 <a href="http://www.klokantech.com/">Klokan Technologies</a> – Software applications for libraries and archives. <a href="http://www.klokantech.com/contact/">Contact us</a>.
    </div>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-8073932-9']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </body>
</html>
