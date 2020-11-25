<header class="jumbotron-fluid hero mb-30 mt-n5">
  <div class="container">
    <div class="row">

      <div class="col-md-6 mb-4">
        <img src="<?= base_url('assets/img/produk/') . $produk['foto_produk']; ?>" class="img-fluid shadow hero-img d-produk">
      </div>

      <div class="col-md-6 text-white">
        <form method="POST" action="index.html">
          <input type="hidden" name="id" value="1">
          <h2 class="display-5"><?= $produk['nama_produk']; ?></h2>
          <p>Rp. <?= rupiah($produk['harga']); ?> ,- </p>

          <h5>Ukuran</h5>
          <div class="d-flex mb-2">
            <?php $ukuran = explode(',', $produk['ukuran']); ?>
            <?php foreach ($ukuran as $uk) : ?>
              <div class="form-check mr-3">
                <input class="form-check-input" type="radio" name="ukuran" id="<?= $uk; ?>" value="<?= $uk; ?>">
                <label class="form-check-label" for="m">
                  <?= $uk; ?>
                </label>
              </div>
            <?php endforeach; ?>
          </div>

          <h5>Stok</h5>
          <p>10</p>

          <h5>Deskripsi Produk</h5>
          <?= $produk['deskripsi_produk']; ?>

          <div class="form-group">
            <label for="jumlah_beli">
              <h5 class="text-light text-capitalize">Jumlah Beli</h5>
            </label>
            <input type="number" name="jumlah_beli" id="jumlah_beli" class="form-control bg-transparent border-light text-white" value="1">
          </div>

          <h5>Terjual</h5>
          <p>40</p>

          <div class="row">
            <div class="container">
              <button type="submit" class="btn btn-outline-light mr-1">
                <i data-feather="shopping-cart"></i>
              </button>
              <a href="#" class="btn btn-outline-light">
                <i data-feather="heart"></i>
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>