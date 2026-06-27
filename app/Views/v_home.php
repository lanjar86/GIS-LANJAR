<div id="map" style="width: 100%; height: 800px;"></div>

<script>
var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

var peta2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles © Esri'
});

var peta3 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; Stadia Maps, OpenMapTiles, OpenStreetMap'
});
    
var peta4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; Stadia Maps & OpenStreetMap'
});
    //const map = L.map('map').setView([-0.8969324307109577, 100.37789834991125], 12);

	//const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		//attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	//}).addTo(map);//

    var map = L.map('map', {
	center: [<?= $web['coordinat_wilayah'] ?>],
	zoom: <?= $web['zoom_view'] ?>,
	layers: [peta1]
});

    var baseMaps = {
	'OpenStreetMap': peta1,
	'Satellite': peta2,
    'Modern' : peta3,
    'Night'  : peta4,
};

var layerControl = L.control.layers(baseMaps).addTo(map);
<?php foreach ($wilayah as $key => $value) { ?>
    L.geoJSON(<?= $value['geojson'] ?>, {
        fillColor: '<?= $value['warna'] ?>',
        fillOpacity: 0.5,
    })
    .bindPopup("<b><?= $value['nama_wilayah'] ?></b>")
    .addTo(map);
<?php } ?>
</script>

</script>