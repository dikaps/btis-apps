<header class="jumbotron-fluid hero">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-white">
        <div class="d-flex flex-column justify-content-center h-100">
          <h2><?= $hero[0]['nama_produk']; ?></h2>
          <p>Cocok buat kamu yang suka <?= $hero[0]['label_produk']; ?></p>
          <p>Rp. <?= rupiah($hero[0]['harga']); ?> ,-</p>

          <?php if ($this->session->userdata('role_id') == 2) : ?>
            <div class="row">
              <div class="container">
                <a href="<?= base_url('produk/dProduk/') . $hero[0]['id_produk']; ?>" class="btn btn-outline-light mr-1" title="Info Produk">
                  <i data-feather="info" stroke-width="1"></i>
                </a>
                <a href="<?= base_url('favorit/add/') . $hero['0']['id_produk']; ?>" class="btn btn-outline-light">
                  <i data-feather="heart" stroke-width="1"></i>
                </a>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-md-6">
        <a href="detail-produk.html" class="d-flex justify-content-center m-4">
          <img src="<?= base_url('assets/img/produk/') . $hero[0]['foto_produk']; ?>" alt="<?= $hero[0]['foto_produk'] ?>" class="img-fluid shadow hero-img">
        </a>
      </div>
    </div>
  </div>
</header>


<section class="bg-white">
  <div class="container">
    <h1>Produk Unggulan</h1>

    <div class="row justify-content-around">
      <?php foreach ($unggulan as $u) : ?>
        <div class="col-md-4 col-6">
          <div class="card shadow w-80">
            <div class="card-body">
              <div class="d-flex">
                <a href="<?= base_url('produk/dProduk/') . $u['id_produk']; ?>" class="text-center">
                  <img src="<?= base_url('assets/img/produk/') . $u['foto_produk']; ?>" alt="" class="img-fluid mb-4 shadow">
                </a>
              </div>
              <div class="text-center">
                <h3><?= $u['nama_produk']; ?></h3>
                <p>
                  Rp. <?= rupiah($u['harga']); ?> ,-
                </p>
              </div>

              <?php if ($this->session->userdata('role_id') == 2) : ?>
                <div class="d-flex justify-content-center bg-info">
                  <div class="btn btn-cart btn-dark shadow" title="Info Produk">
                    <a href="<?= base_url('produk/dProduk/') . $u['id_produk']; ?>" class="text-white">
                      <i data-feather="info" stroke-width="1"></i>
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="jumbotron-fluid hero">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-white">
        <div class="d-flex flex-column justify-content-center h-100">
          <h2><?= $hero[1]['nama_produk']; ?></h2>
          <p>Cocok buat kamu yang suka <?= $hero[1]['label_produk']; ?></p>
          <p>Rp. <?= rupiah($hero[1]['harga']); ?> ,-</p>

          <?php if ($this->session->userdata('role_id') == 2) : ?>
            <div class="row">
              <div class="container">
                <a href="<?= base_url('produk/dProduk/') . $hero[1]['id_produk']; ?>" class="btn btn-outline-light mr-1" title="Info Produk">
                  <i data-feather="info" stroke-width="1"></i>
                </a>
                <a href="<?= base_url('favorit/add/') . $hero['1']['id_produk']; ?>" class="btn btn-outline-light">
                  <i data-feather="heart" stroke-width="1"></i>
                </a>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-md-6">
        <a href="" class="d-flex justify-content-center m-4">
          <img src="<?= base_url('assets/img/produk/') . $hero[1]['foto_produk']; ?>" alt="<?= $hero[1]['foto_produk'] ?>" class="img-fluid shadow hero-img">
        </a>
      </div>
    </div>
  </div>
</div>

<section class="bg-white">
  <div class="container">
    <h1>Sedang Diskon</h1>
    <div class="row justify-content-around">
      <?php foreach ($diskon as $d) : ?>
        <div class="col-md-4 col-6">
          <div class="card shadow w-80">
            <div class="card-body">
              <div class="btn-disc d-flex justify-content-end">
                <span><?= $d['besar_diskon']; ?>%</span>
              </div>
              <div class="d-flex">
                <a href="" class=" text-center">
                  <img src="<?= base_url('assets/img/produk/') . $d['foto_produk']; ?>" alt="<?= $d['foto_produk']; ?>" class="img-fluid mb-4 shadow">
                </a>
              </div>
              <div class="text-center">
                <h3><?= $d['nama_produk']; ?></h3>
                <p class="text-danger">
                  <del>
                    Rp. <?= rupiah($d['harga']); ?> ,-
                  </del>
                </p>
                <p>Rp. <?= rupiah(hargaDiskon($d['harga'], $d['besar_diskon'])); ?> ,-</p>
              </div>

              <?php if ($this->session->userdata('role_id') == 2) : ?>
                <div class="d-flex justify-content-center shadow">
                  <div class="btn btn-cart btn-dark">
                    <a href="<?= base_url('produk/dProduk/') . $d['id_produk']; ?>" class="text-white" title="Info Produk">
                      <i data-feather="info" stroke-width="1"></i>
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>