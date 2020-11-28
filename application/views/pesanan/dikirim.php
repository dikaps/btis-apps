<section class="container mt-n5">
  <h2 class="text-bold text-uppercase mb-3">pesanan yang sedang dikirim</h2>

  <div class="row">
    <table class="table table-borderless text-white">
      <thead>
        <tr>
          <th>#</th>
          <th>Gambar</th>
          <th>Nama Produk</th>
          <th>Resi Pengiriman</th>
          <th>Penerima</th>
          <th>Status Pemesanan</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php $i = 1;
        foreach ($pesanan as $p) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td>
              <img src="<?= base_url('assets/img/produk/') . $p['foto_produk']; ?>" alt="onigiri" width="100px" />
            </td>
            <td><?= $p['nama_produk']; ?></td>
            <td><?= $p['resi_pengiriman']; ?></td>
            <td>
              <?= $p['penerima']; ?>
              <br>
              <?= $p['telepon_penerima']; ?>
            </td>
            <td>
              <?php if ($p['status_pemesanan'] == 0) : ?>
                Belum Diterima
              <?php endif; ?>
            </td>
            <td>
              <a href="<?= base_url('pesanan/detailPesanan/') . $p['id_pesanan']; ?>" class="btn btn-sm btn-outline-info mb-2" data-toggle="tooltip" data-placement="top" title="Detail Pesanan" id="detail">
                <i data-feather="info"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>