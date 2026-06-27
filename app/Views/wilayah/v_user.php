<div class="col-md-12 text-center mt-4">
  <div class="welcome-lanjar" style="font-size: 24px; font-weight: bold; color: #334155; margin-bottom: 20px;">
    Manajemen Data User & Hak Akses Kasir
  </div>
</div>

<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h3 class="card-title font-weight-bold m-0">
        <i class="fas fa-users"></i> Data User
      </h3> 
      <div class="card-tools ml-auto">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-user">
          <i class="fas fa-plus"></i> Tambah User
        </button>
      </div>
    </div>
    
    <div class="card-body bg-white">
      <?php if (session()->getFlashdata('PESAN')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
              <?= session()->getFlashdata('PESAN') ?>
          </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table id="example2" class="table table-bordered table-striped align-middle m-0">
          <thead>
            <tr class="text-center bg-primary text-white">
              <th width="60px">No</th>
              <th>Nama User</th>
              <th>Email</th>
              <th width="180px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $NO = 1; ?>
            <?php if (!empty($USER) && is_array($USER)) : ?>
                <?php foreach ($USER as $KEY => $VALUE) : ?>
                <tr>
                  <td class="text-center align-middle font-weight-bold"><?= $NO++ ?></td>
                  <td class="align-middle font-weight-bold"><?= $VALUE['nama_user'] ?></td>
                  <td class="align-middle"><?= $VALUE['email'] ?></td>
                  <td class="text-center align-middle">
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-user<?= $VALUE['id_user'] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <a href="<?= base_url('User/Delete/' . $VALUE['id_user']) ?>" onclick="return confirm('Yakin ingin menghapus user ini?')" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>

                <div class="modal fade" id="edit-user<?= $VALUE['id_user'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-warning text-dark">
                        <h5 class="modal-title font-weight-bold"><i class="fas fa-edit"></i> Edit User: <?= $VALUE['nama_user'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?= form_open('User/UpdateData/' . $VALUE['id_user']) ?>
                      <div class="modal-body text-left">
                        <div class="form-group">
                          <label style="font-weight: 700;">Nama User</label>
                          <input type="text" name="NAMA_USER" value="<?= $VALUE['nama_user'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label style="font-weight: 700;">Email</label>
                          <input type="email" name="EMAIL" value="<?= $VALUE['email'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label style="font-weight: 700;">Password Baru <small class="text-danger">(Kosongkan jika tidak diganti)</small></label>
                          <input type="password" name="PASSWORD" class="form-control" placeholder="Masukkan password baru jika ingin ganti">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                      </div>
                      <?= form_close() ?>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">Data user kosong atau belum diinput di database.</td>
                </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tambah-user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title font-weight-bold"><i class="fas fa-plus-circle"></i> Tambah User Baru</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('User/InsertData') ?>
      <div class="modal-body">
        <div class="form-group">
          <label style="font-weight: 700;">Nama User</label>
          <input type="text" name="NAMA_USER" class="form-control" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group">
          <label style="font-weight: 700;">Email</label>
          <input type="email" name="EMAIL" class="form-control" placeholder="contoh@gmail.com" required>
        </div>
        <div class="form-group">
          <label style="font-weight: 700;">Password</label>
          <input type="password" name="PASSWORD" class="form-control" placeholder="Password Akun" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan User</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>