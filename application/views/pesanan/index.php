<section class="container mt-n5">
  <h2 class="text-bold text-uppercase mb-3">pesanan baru</h2>

  <div class="row">
    <table class="table table-borderless text-white">
      <thead>
        <tr>
          <th>#</th>
          <th>Gambar</th>
          <th>Nama Produk</th>
          <th>Ukuran</th>
          <th>Penerima</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php $i = 1;
        foreach ($pesanan_baru as $pb) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td>
              <img src="<?= base_url('assets/img/produk/') . $pb['foto_produk']; ?>" width="100px" />
            </td>
            <td><?= $pb['nama_produk']; ?></td>
            <td><?= $pb['ukuran_produk']; ?></td>
            <td>
              <?= $pb['username']; ?> <br>
              <?= $pb['telepon_penerima']; ?>
            </td>
            <td>
              <a href="<?= base_url('pesanan/detailPesanan/') . $pb['id_pesanan']; ?>" class="btn btn-sm btn-outline-info mb-2" data-toggle="tooltip" data-placement="top" title="Detail Pesanan" id="detail">
                <i data-feather="info"></i>
              </a>


              <button type="button" class="btn btn-sm btn-outline-warning mb-2 button-resi" data-id="<?= $pb['id_pesanan']; ?>" data-toggle="modal" data-target="#tb-resi" title="Edit Resi">
                <i data-feather="edit"></i>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<!-- modal for add product -->
<div class="modal fade" id="tb-resi" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">tambah no resi pengiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="alert alert-info d-none" id="pesan" role="alert"></div>
          <form method="POST" class="form-resi">
            <input type="hidden" name="id_pesanan" id="id-pesanan">
            <div class="form-group">
              <label for="resi">Nomer Resi</label>
              <input type="text" name="resi" id="resi" class="form-control">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Tutup
        </button>
        <button type="submit" class="btn btn-primary edit-resi">Edit Resi</button>
        </form>
      </div>
    </div>
  </div>
</div>