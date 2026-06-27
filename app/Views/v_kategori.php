<style>
.content-wrapper {
    background: linear-gradient(-45deg, #0057b8, #e31b23, #ffd400, #0057b8) !important;
    background-size: 400% 400% !important;
    animation: bgMarketKategori 10s ease infinite !important;
    min-height: 100vh;
}

@keyframes bgMarketKategori {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Mengembalikan Card agar Full Width */
.card-premium {
    width: 100% !important;
}
</style>

<div class="col-md-12 text-center">
  <div class="welcome-lanjar">
    Manajemen Kategori Retail & Icon Marker Pemetaan
  </div>
</div>

<div class="col-md-12">
  <div class="card card-premium">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h3 class="card-title font-weight-bold">
        <i class="fas fa-tags"></i> <?= $Judul ?>
      </h3> 
      <div class="card-tools ml-auto">
        <a href="<?= base_url('Kategori/Input') ?>" class="btn btn-premium btn-sm">
          <i class="fas fa-plus"></i> Tambah Kategori
        </a>
      </div>
    </div>
    
    <div class="card-body">
      <?php if (session()->getFlashdata('insert')) : ?>
          <div class="alert alert-success alert-dismissible fade show" style="border-radius: 12px; background: linear-gradient(135deg, #16a34a, #22c55e); border: none; color: white;">
              <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
              <?= session()->getFlashdata('insert') ?>
          </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('update')) : ?>
          <div class="alert alert-info alert-dismissible fade show" style="border-radius: 12px; background: linear-gradient(135deg, #0057b8, #003b80); border: none; color: white;">
              <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-info-circle"></i> Diupdate!</h5>
              <?= session()->getFlashdata('update') ?>
          </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('delete')) : ?>
          <div class="alert alert-danger alert-dismissible fade show" style="border-radius: 12px; background: linear-gradient(135deg, #dc2626, #b91c1c); border: none; color: white;">
              <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Dihapus!</h5>
              <?= session()->getFlashdata('delete') ?>
          </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table id="example2" class="table table-bordered table-striped align-middle">
          <thead>
            <tr class="text-center" style="background: linear-gradient(90deg, #0057b8, #e31b23, #ffd400); color: white;">
              <th width="60px">No</th>
              <th>Kategori</th>
              <th>Marker</th>
              <th width="180px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($kategori as $key => $value) { ?>
            <tr>
              <td class="text-center align-middle font-weight-bold" style="color: #0057b8; font-size: 16px;"><?= $no++ ?></td>
              <td class="align-middle">
                <span class="badge" style="background: rgba(0, 87, 184, 0.1); color: #0057b8; padding: 10px 16px; border-radius: 8px; font-size: 14px; font-weight: 700; border: 1px solid rgba(0, 87, 184, 0.2);">
                  <i class="fas fa-store-alt mr-1"></i> <?= $value['kategori'] ?>
                </span>
              </td>
              <td class="text-center align-middle">
                <div style="background: #f8fafc; padding: 6px; border-radius: 10px; display: inline-block; border: 1px solid #e2e8f0;">
                  <img src="<?= base_url('marker/' . $value['marker']) ?>" width="55px" style="filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.15));">
                </div>
              </td>
              <td class="text-center align-middle">
                <button class="btn btn-sm" data-toggle="modal" data-target="#ganti-marker<?= $value['id_kategori'] ?>" style="background: #ffd400; color: #000; border: none; border-radius: 8px; font-weight: 700; padding: 8px 14px; box-shadow: 0 4px 6px rgba(255, 212, 0, 0.3); transition: .2s;">
                  <i class="fas fa-map-marker-alt"></i> Ganti Marker
                </button>
              </td>
            </tr>

            <div class="modal fade" id="ganti-marker<?= $value['id_kategori'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 18px; overflow: hidden; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.25);">
                  
                  <div class="modal-header" style="background: linear-gradient(90deg, #0057b8, #e31b23, #ffd400); color: white; border: none;">
                    <h5 class="modal-title font-weight-bold">
                      <i class="fas fa-edit"></i> Ganti Marker: <?= $value['kategori'] ?>
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <?= form_open_multipart('Kategori/updateMarker/' . $value['id_kategori']) ?>
                  <div class="modal-body" style="padding: 25px; background: #fff;">
                    
                    <div class="text-center mb-4">
                      <p class="mb-2 text-muted small font-weight-bold" style="letter-spacing: 1px;">MARKER SAAT INI</p>
                      <div style="background: #f8fafc; padding: 12px; border-radius: 12px; display: inline-block; border: 2px dashed #e31b23;">
                        <img src="<?= base_url('marker/' . $value['marker']) ?>" width="65px">
                      </div>
                    </div>

                    <div class="form-group text-left mb-0"> 
                      <label style="color: #334155; font-weight: 700;">Pilih File Gambar Baru</label>
                      <input type="file" name="marker" class="form-control" accept="image/*" required style="padding-top: 10px; border-radius: 12px !important;">
                      <small class="text-muted mt-2 d-block"><i class="fas fa-info-circle text-primary"></i> Gunakan format PNG transparan agar peta terlihat rapi.</small>
                    </div>

                  </div>
                  
                  <div class="modal-footer" style="border-top: none; padding: 15px 25px 25px; background: #fff;"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 12px; padding: 10px 20px;">Batal</button>
                    <button type="submit" class="btn btn-premium">
                      <i class="fas fa-upload"></i> Upload & Simpan
                    </button>
                  </div>
                  <?= form_close() ?>

                </div>
              </div>
            </div>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>