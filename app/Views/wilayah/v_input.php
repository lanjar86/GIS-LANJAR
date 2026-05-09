<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"> <?= $Judul ?></h3>
        </div>
        <div class="card-body">
            <?php 
            helper('form');
            ?>
            
            <?php echo form_open('Wilayah/InsertData') ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Wilayah</label>
                        <input name="nama_wilayah" value="<?= old('nama_wilayah') ?>" class="form-control">
                        <p class="text-danger">
                            <?= validation_show_error('nama_wilayah') ?>
                        </p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Warna Wilayah</label>
                        <input name="warna" value="<?= old('warna') ?>" class="form-control my-colorpicker1">
                        <p class="text-danger">
                            <?= validation_show_error('warna') ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>GeoJson</label>
                <textarea name="geojson" class="form-control" rows="15"><?= old('geojson') ?></textarea>
                <p class="text-danger">
                    <?= validation_show_error('geojson') ?>
                </p>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-flat" type="submit"> Simpan </button>
                <a href="<?= base_url('Wilayah') ?>" class="btn btn-success btn-flat"> Kembali </a>
            </div>
            
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.my-colorpicker1').colorpicker();
    });
</script>