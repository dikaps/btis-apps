<section class="container mt-n5">
  <?php if (validation_errors()) : ?>
    <div class="alert alert-danger alert-pesan" role="alert"><?= validation_errors(); ?></div>
  <?php endif; ?>
  <?= $this->session->flashdata('pesan'); ?>
  <div class="d-flex justify-content-between">
    <h2 class="text-bold text-uppercase mb-3">Daftar kategori</h2>

    <button type="button" class="btn btn-sm btn-outline-light mb-2 btn-tambah" data-toggle="modal" data-target="#tb-kategori">
      <i data-feather="plus"></i>
    </button>
  </div>

  <div class="row">
    <table class="table table-borderless text-white">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Produk</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php if ($this->Produk_model->getJumlahKategori() == 0) : ?>
          <tr>
            <td class="text-center lead" colspan="100">
              <?= ($this->Produk_model->getJumlahKategori() == 0) ? "Data Masih Kosong" : null; ?>
            </td>
          </tr>
        <?php endif; ?>

        <?php $i = 1;
        foreach ($kategori as $k) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $k['nama_kategori']; ?></td>
            <td>
              <button type="button" class="btn btn-sm btn-outline-warning mb-2 edit-kategori" data-toggle="modal" data-target="#tb-kategori" data-id="<?= $k['id_kategori']; ?>">
                <a href="#" class="text-warning" data-toggle="tooltip" data-placement="top" title="Edit Kategori" id="hapus">
                  <i data-feather="edit"></i>
                </a>
              </button>

              <button type="button" class="btn btn-sm btn-outline-danger mb-2 hapus-kategori" data-toggle="modal" data-target="#dl-kategori" data-id="<?= $k['id_kategori']; ?>">
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

<!-- modal for add category -->
<div class="modal fade" id="tb-kategori" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">tambah kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form method="POST" action="<?= base_url('produk/kategori'); ?>">
            <div class="form-group">
              <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Nama Kategori">
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

<!-- modal for delete category -->
<div class="modal fade" id="dl-kategori" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">delete kategori</h5>
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
        <a href="#" class="btn btn-danger" id="hapus-kategori">Hapus</a>
      </div>
    </div>
  </div>
</div>