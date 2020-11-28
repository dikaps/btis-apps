<section class="container">
  <h2 class="text-bold text-uppercase">Konfirmasi Pembayaran</h2>

  <div class="row justify-content-between">
    <div class="col-12 col-md-6 my-3">
      <div class="d-flex">
        <img src="<?= base_url('assets/img/produk/') . $produk['foto_produk']; ?>" alt="<?= $produk['foto_produk'] ?>" class="img-fluid p-produk">

        <div class="text-white ml-3 my-auto">
          <h2 class="text-bold text-uppercase mb-0"><?= $produk['nama_produk']; ?></h2>
          <p class="mb-0">Rp. <?= rupiah($produk['harga']); ?> ,-</p>
          <p class="mb-0"><?= $produk['ukuran']; ?></p>
          <p><?= $produk['jml_beli']; ?>x</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-body m-2">
          <h2 class="text-uppercase mb-3">Alamat penerima</h2>

          <form method="POST" action="">
            <input type="hidden" name="id_keranjang" value="<?= $produk['id_keranjang'] ?>">
            <input type="hidden" name="ukuran_produk" value="<?= $produk['ukuran']; ?>">
            <input type="hidden" name="jml_beli" value="<?= $produk['jml_beli']; ?>">
            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
            <div class="form-group">
              <select class="custom-select" id="konfirmasi-alamat" name='alamat'>
                <option value="">Pilih Alamat</option>
                <?php foreach ($alamat as $al) : ?>
                  <?php $sort_address = explode(',', $al['alamat']); ?>
                  <option value="<?= $al['id_alamat']; ?>"><?= $sort_address[0]; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>


            <h2 class="text-uppercase mt-4 mb-2">Informasi alamat</h2>

            <div class="informasi-alamat">
              <p>
                <i data-feather="user" class="mr-3"></i>
                <span id="penerima"></span>
              </p>

              <p>
                <i data-feather="map-pin" class="mr-3"></i>
                <span id="alamat-penerima"></span>
              </p>

              <p>
                <i data-feather="phone" class="mr-3"></i>
                <span id="telepon-penerima"></span>
              </p>

              <h2 class="text-uppercase mt-4 mb-2">Pembayaran</h2>

              <div class="d-flex">
                <?php foreach ($bank as $b) : ?>
                  <div class="form-check mr-3">
                    <input type="radio" name="bank" id="<?= $b['nama_bank']; ?>" class="form-check-input" value="<?= $b['id_bank']; ?>">
                    <label for="<?= $b['nama_bank']; ?>"><?= $b['nama_bank']; ?></label>
                  </div>
                <?php endforeach; ?>
              </div>

              <h2 class="text-uppercase mt-4 mb-3">Kurir</h2>
              <p>
                <i data-feather="package" class="mr-3"></i>
                J&T Express
              </p>

              <div class="d-flex justify-content-between">
                <p>Subtotal</p>
                <?php $subtotal = $produk['harga'] * $produk['jml_beli']; ?>
                <p>Rp. <?= rupiah($subtotal); ?> ,-</p>
              </div>
              <div class="d-flex justify-content-between">
                <p>Diskon</p>
                <?php if (!empty($diskon)) : ?>
                  <?php $diskon = $subtotal * $diskon['besar_diskon'] / 100; ?>
                <?php endif; ?>
                <p>Rp. <?= rupiah($diskon); ?> ,-</p>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <p>Total Bayar</p>
                <p>Rp. <?= rupiah($subtotal - $diskon); ?> ,-</p>
                <input type="hidden" name="total_bayar" value="<?= $subtotal - $diskon; ?>">
              </div>

              <button type="submit" class="btn btn-dark-mediun float-right">Bayar</button>
              <!-- <a href="bayar.html" class="btn btn-dark-mediun float-right">Bayar</a> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</section>