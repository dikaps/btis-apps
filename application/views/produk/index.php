<section class="container mt-n5">
  <div class="d-flex justify-content-between">
    <h2 class="text-bold text-uppercase mb-3">Daftar produk</h2>

    <a href="<?= base_url('produk/tambahproduk'); ?>" class="btn btn-sm btn-outline-light mb-2" data-toggle="tooltip" data-placement="top" title="Tambah Produk" id="tambah">
      <i data-feather="plus"></i>
    </a>
  </div>

  <div class="row">
    <div class="col-12">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
    <div class="card col-12" style="overflow: auto;">
      <div class="card-body">
        <table class="table table-borderless text-dark" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Gambar</th>
              <th>Nama Produk</th>
              <th>Ukuran</th>
              <th>Kategori</th>
              <th>Stok</th>
              <th>Terjual</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1;
            foreach ($produk as $p) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td>
                  <img src="assets/img/produk/<?= $p['foto_produk']; ?>" alt="<?= $p['foto_produk']; ?>" class="shadow" width="100px" />
                </td>
                <td><?= $p['nama_produk']; ?></td>
                <td><?= $p['ukuran']; ?></td>
                <td><?= $p['nama_kategori']; ?></td>
                <td><?= $p['stok']; ?></td>
                <td>
                  <?php
                  echo ($p['terjual'] == 0) ? "Belum terjual" : $p['terjual'];
                  ?>
                </td>
                <td>Rp. <?= rupiah($p['harga']); ?> ,-</td>
                <td>
                  <a href="<?= base_url('produk/editProduk/') . $p['id_produk']; ?>" class="btn btn-sm btn-outline-warning mb-2" data-toggle="tooltip" data-placement="top" title="Edit Produk" id="edit">
                    <i data-feather="edit"></i>
                  </a>

                  <button type="button" class="btn btn-sm btn-outline-danger mb-2 hapus-produk" data-toggle="modal" data-target="#dl-produk" data-id="<?= $p['id_produk']; ?>">
                    <a href="#" class="text-danger hapus-produk" data-toggle="tooltip" data-placement="top" title="Hapus Produk" id="hapus">
                      <i data-feather="trash"></i>
                    </a>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- modal for delete category -->
<div class="modal fade" id="dl-produk" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">hapus produk</h5>
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
        <a href="#" class="btn btn-danger" id="hapus-produk">Hapus</a>
      </div>
    </div>
  </div>
</div>