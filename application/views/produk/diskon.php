<section class="container mt-n5">
  <div class="d-flex justify-content-between">
    <h2 class="text-bold text-uppercase mb-3">Daftar produk diskon</h2>

    <button type="button" class="btn btn-sm btn-outline-light mb-2 tb-diskon" data-toggle="modal" data-target="#tb-diskon">
      <i data-feather="plus"></i>
    </button>

  </div>

  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger alert-pesan col-12" role="alert"><?= validation_errors(); ?></div>
    <?php endif; ?>
    <table class="table table-borderless text-white">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Produk</th>
          <th>Besar Diskon</th>
          <th>Is Active</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php if (empty($diskon)) : ?>
          <tr>
            <td colspan="100" class="pt-5 text-center">
              <span class="lead">Data Masih Kosong</span>
            </td>
          </tr>
        <?php endif; ?>
        <?php $i = 1;
        foreach ($diskon as $d) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $d['nama_produk']; ?></td>
            <td><?= $d['besar_diskon']; ?> %</td>
            <td>
              <?php if ($d['is_active'] == 1) : ?>
                Aktif
              <?php else : ?>
                Tidak Aktif
              <?php endif; ?>
            </td>
            <td>
              <button type="button" class="btn btn-sm btn-outline-warning mb-2 edit-diskon" data-id="<?= $d['id_diskon']; ?>" data-toggle="modal" data-target="#tb-diskon">
                <a href="#" class="text-warning" data-toggle="tooltip" data-placement="top" title="Edit Kategori" id="hapus">
                  <i data-feather="edit"></i>
                </a>
              </button>

              <button type="button" class="btn btn-sm btn-outline-danger mb-2 hapus-diskon" data-toggle="modal" data-target="#dl-diskon" data-id="<?= $d['id_diskon']; ?>">
                <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top" title="Hapus Produk" id="hapus">
                  <i data-feather="trash"></i>
                </a>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<!-- modal for add product -->
<div class="modal fade" id="tb-diskon" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">tambah diskon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form method="POST" action="">
            <div class="form-group">
              <label for="id_produk">Nama Produk</label>
              <select name="id_produk" id="id_produk" class="custom-select">
                <option value="">Pilih produk</option>
                <?php foreach ($produk as $p) : ?>
                  <option value="<?= $p['id_produk']; ?>"><?= $p['nama_produk']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="diskon">Besar Diskon</label>
              <input type="text" name="diskon" id="diskon" class="form-control">
            </div>

            <div class="form-check form-check-inline">
              <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" checked />
              <label for="is_active" class="form-check-label">Is active</label>
            </div>

        </div>
      </div>
      <div class=" modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Tutup
        </button>
        <button type="submit" class="btn btn-primary btn-toggle">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal for delete discount -->
<div class="modal fade" id="dl-diskon" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">delete diskon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="lead">Yakin mau dihapus?</p>
      </div>
      <div class=" modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Tutup
        </button>
        <a href="#" class="btn btn-danger" id="hapus-diskon">Hapus</a>
      </div>
    </div>
  </div>
</div>