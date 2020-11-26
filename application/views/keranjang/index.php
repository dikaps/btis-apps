<section>
  <div class="container">
    <h2 class="text-bold text-uppercase">Keranjang Saya</h2>

    <div class="row justify-content-between">
      <?php foreach ($keranjang as $k) : ?>
        <div class="col-12 col-md-6">
          <div class="r-produk mt-5">
            <div class="d-flex">
              <img src="<?= base_url('assets/img/produk/') . $k['foto_produk']; ?>" alt="gon" class="img-fluid mr-3">

              <div class="text-white my-auto">
                <h2><?= $k['nama_produk']; ?></h2>
                <p>Rp. <?= rupiah($k['harga']); ?> ,-</p>
                <p>
                  <?= $k['ukuran']; ?>
                </p>
                <p><?= $k['jml_beli']; ?>x</p>

                <div class="mt-3">
                  <a href="<?= base_url('keranjang/konfirmasiBayar/') . $k['id_keranjang']; ?>" class="btn btn-outline-light text-uppercase mr-2">Checkout</a>

                  <a href="<?= base_url('keranjang/delete/') . $k['id_keranjang']; ?>" class="btn btn-outline-light text-uppercase">Batal</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>