<header class="jumbotron-fluid hero mb-30 mt-n5">
  <div class="container">
    <div class="row">

      <div class="col-md-6 mb-4">
        <?php if (empty($diskon)) : ?>
        <?php else : ?>
          <div class="btn-disc">
            <span><?= $diskon['besar_diskon']; ?>%</span>
          </div>
        <?php endif; ?>

        <img src="<?= base_url('assets/img/produk/') . $produk['foto_produk']; ?>" class="img-fluid shadow hero-img d-produk">
      </div>

      <div class="col-md-6 text-white">
        <form method="POST" action="<?= base_url('keranjang/add') ?>">
          <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
          <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
          <input type="hidden" name="ukuran" value="<?= $produk['ukuran']; ?>">
          <h2 class="display-5"><?= $produk['nama_produk']; ?></h2>
          <?php if (empty($diskon)) : ?>
            <p>Rp. <?= rupiah($produk['harga']); ?> ,- </p>
            <input type="hidden" name="harga" value="<?= $produk['harga']; ?>">
          <?php else : ?>
            <div class="d-flex">
              <p class="text-danger mr-2">
                <del> Rp. <?= rupiah($produk['harga']); ?> ,- </del>
              </p>
              <p>Rp. <?= rupiah(hargaDiskon($produk['harga'], $diskon['besar_diskon'])); ?> ,- </p>
              <input type="hidden" name="harga" value="<?= hargaDiskon($produk['harga'], $diskon['besar_diskon']); ?>">
            </div>
          <?php endif; ?>

          <h5>Ukuran</h5>
          <div class="d-flex mb-2">
            <?php $ukuran = explode(',', $produk['ukuran']); ?>
            <?php foreach ($ukuran as $uk) : ?>
              <div class="form-check mr-3">
                <input class="form-check-input" type="radio" name="ukuran" id="<?= $uk; ?>" value="<?= $uk; ?>">
                <label class="form-check-label" for="<?= $uk; ?>">
                  <?= $uk; ?>
                </label>
              </div>
            <?php endforeach; ?>
          </div>

          <h5>Stok</h5>
          <p><?= $produk['stok']; ?></p>

          <h5>Deskripsi Produk</h5>
          <?= $produk['deskripsi_produk']; ?>

          <div class="form-group">
            <label for="jml_beli">
              <h5 class="text-light text-capitalize">Jumlah Beli</h5>
            </label>
            <input type="number" name="jml_beli" id="jml_beli" class="form-control bg-transparent border-light text-white" value="1">
          </div>

          <h5>Terjual</h5>
          <p><?= $produk['terjual']; ?></p>

          <?php if ($this->session->userdata('role_id') == 2) : ?>
            <div class="row">
              <div class="container">
                <button type="submit" class="btn btn-outline-light mr-1">
                  <i data-feather="shopping-cart"></i>
                </button>
                <a href="<?= base_url('favorit/add/') . $produk['id_produk']; ?>" class="btn btn-outline-light">
                  <i data-feather="heart"></i>
                </a>
              </div>
            </div>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</header>