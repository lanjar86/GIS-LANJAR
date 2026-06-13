<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $Judul ?></h3>
    </div>
    <?= form_open('Wilayah/UpdateData/' . $wilayah['id_wilayah']) ?>
    <div class="card-body">

      <div class="form-group">
        <label>Nama Wilayah</label>
        <input name="nama_wilayah" value="<?= old('nama_wilayah', $wilayah['nama_wilayah']) ?>" class="form-control" placeholder="Nama Wilayah" required>
      </div>

      <div class="form-group">
        <label>Warna Wilayah</label>
        <input type="color" name="warna" value="<?= old('warna', $wilayah['warna']) ?>" class="form-control" style="width: 150px; height: 40px;" required>
      </div>

      <div class="form-group">
        <label>GeoJSON Wilayah</label>
        <textarea name="geojson" rows="8" class="form-control" placeholder="Paste GeoJSON di sini" required><?= old('geojson', $wilayah['geojson']) ?></textarea>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-save"></i> Simpan Perubahan</button>
      <a href="<?= base_url('Wilayah') ?>" class="btn btn-success btn-flat">Kembali</a>
    </div>
    <?= form_close() ?>
  </div>
  </div>

<div class="col-md-12">
  <div id="map" style="width:100%;height:800px;"></div>
</div>

<script>
var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
var peta2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');
var peta3 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png');
var peta4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png');

var map = L.map('map',{
  center:[<?= $web['coordinat_wilayah'] ?>],
  zoom:<?= $web['zoom_view'] ?>,
  layers:[peta1]
});

var baseMaps = {
  "OpenStreetMap":peta1,
  "Satellite":peta2,
  "Modern":peta3,
  "Night":peta4
};

L.control.layers(baseMaps).addTo(map);

// Menampilkan data GeoJSON milik wilayah yang sedang diedit saat ini
var dataWilayah = L.geoJSON(<?= $wilayah['geojson'] ?>, {
    fillColor: '<?= $wilayah['warna'] ?>',
    fillOpacity: 0.5,
})
.bindPopup("<b><?= $wilayah['nama_wilayah'] ?></b>")
.addTo(map);

// Membuat kamera peta otomatis fokus ke area wilayah yang sedang di-edit
map.fitBounds(dataWilayah.getBounds());
</script>