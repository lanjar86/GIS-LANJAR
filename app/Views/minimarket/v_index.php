<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $Judul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <?php
            if (session()->getFlashdata('insert')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>' . session()->getFlashdata('insert') . '</h5></div>';
            }

            if (session()->getFlashdata('update')) {
                echo '<div class="alert alert-primary alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>' . session()->getFlashdata('update') . '</h5></div>';
            }

            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>' . session()->getFlashdata('delete') . '</h5></div>';
            }
            ?>

            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama Minimarket</th>
                        <th>Alamat</th>
                        <th>Rating</th>
                        <th>Foto</th> <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($minimarket as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value['nama_minimarket'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td class="text-center"><?= $value['rating'] ?></td>
                            
                            <td class="text-center">
                                <img src="<?= base_url('foto/' . $value['foto']) ?>" width="150px">
                            </td>

                            <td class="text-center">
                                <a href="<?= base_url('Minimarket/Edit/' . $value['id_minimarket']) ?>" class="btn btn-xs btn-info btn-flat"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('Minimarket/Edit/' . $value['id_minimarket']) ?>" class="btn btn-xs btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('Minimarket/Delete/' . $value['id_minimarket']) ?>" onclick="return confirm('Yakin Hapus Data...?')" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        </div>
    </div>

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Tambah Data Minimarket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <?php echo form_open_multipart('Minimarket/InsertData') ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Minimarket</label>
                            <input type="text" name="nama_minimarket" class="form-control" placeholder="Contoh: Alfamart Kaliwadas" required>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="1">Alfamart</option>
                                <option value="2">Indomaret</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Rating Toko</label>
                            <select name="rating" class="form-control" required>
                                <option value="">-- Pilih Rating --</option>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status Operasional</label>
                            <select name="status" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                                <option value="Renovasi">Renovasi</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Koordinat Wilayah</label>
                            <input type="text" name="koordinat" class="form-control" placeholder="Contoh: -7.261816, 108.978516" required>
                        </div>

                        <div class="form-group">
                            <label>Pilih Wilayah (Kecamatan/Desa)</label>
                            <select name="id_wilayah" class="form-control" required>
                                <option value="">-- Pilih Wilayah --</option>
                                <option value="8">Wilayah 8</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Foto Minimarket</label>
                            <input type="file" name="foto" class="form-control-file" accept="image/*" required>
                        </div>

                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap..." required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
            <?php echo form_close() ?>
            </div>
        </div>
    </div>