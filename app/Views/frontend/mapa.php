<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <!-- Make sure you put this AFTER Leaflet's CSS -->
   <style>
#mapid {
    width: 100%;
    height: 100vh;
}

</style>
    </head>
<body>
<div id="mapid"></div>



</body>
</html>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>

var mapid = L.map('mapid').setView([49.032687, 17.643536], 12);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapid);


</script>

<?php foreach ($skoly as $row) { ?>
    <script>var marker = L.marker([<?php echo $row['geo-lat']; ?>, <?php echo $row['geo-long']; ?>]).addTo(mapid).bindPopup('<?php echo $row['skola']; ?>');; </script>
<?php  } ?>