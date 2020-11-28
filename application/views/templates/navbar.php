<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light mt-0">
  <div class="container-md">
    <a href="<?= base_url(); ?>" class="navbar-brand"><img src="<?= base_url('assets/'); ?>img/BTis.png" alt="logo" width="100px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="#nav" aria-expanded="false" aria-label="Toggle navigation" id="btn-nav">
      <!-- <span class=" navbar-toggler-icon"></span> -->
      <i data-feather="menu" id="show"></i>
      <i data-feather="x" id="hidden" class="d-none"></i>
    </button>

    <div class="collapse navbar-collapse" id="nav">
      <div class="navbar-nav ml-auto">
        <a href="<?= base_url('beranda'); ?>" class="nav-item nav-link text-white">Beranda</a>

        <?php if ($this->session->userdata('role_id') == 1) :  ?>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="produk-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Produk
              </a>

              <div class="dropdown-menu" aria-labelledby="produk-dropdown">
                <a class="dropdown-item" href="<?= base_url('produk'); ?>">
                  Daftar Produk
                </a>
                <hr />
                <a class="dropdown-item" href="<?= base_url('produk/kategori'); ?>">
                  Daftar Kategori
                </a>
                <a class="dropdown-item" href="<?= base_url('produk/produkdiskon'); ?>">
                  Produk Diskon
                </a>
              </div>
            </li>
          </ul>

          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="produk-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pesanan
              </a>

              <div class="dropdown-menu" aria-labelledby="produk-dropdown">
                <a class="dropdown-item" href="<?= base_url('pesanan'); ?>">
                  Baru
                  <?php if ($jml_pesanan == 0) : ?>
                  <?php else : ?>
                    <span class="badge badge-warning"><?= $jml_pesanan; ?></span>
                  <?php endif; ?>
                </a>
                <a class="dropdown-item" href="<?= base_url('pesanan/dikirim'); ?>">
                  Dikirim
                </a>
                <a class="dropdown-item" href="<?= base_url('pesanan/selesai'); ?>">
                  Selesai
                </a>
              </div>
            </li>
          </ul>
        <?php else : ?>
          <a href="<?= base_url('produk/daftarproduk') ?>" class="nav-item nav-link text-white">Daftar Produk</a>
        <?php endif; ?>
      </div>
    </div>

    <div class="collapse navbar-collapse float-right" id="nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="menuProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span data-feather="user" stroke-width="1"></span>
          </a>

          <div class="dropdown-menu" aria-labelledby="menuProfile">
            <a class="dropdown-item" href="<?= base_url('profile') ?>">
              <?= $user['username']; ?>
            </a>
            <?php if ($this->session->userdata('role_id') == 2) : ?>
              <hr>
              <a class="dropdown-item" href="<?= base_url('favorit'); ?>">
                Favorit Saya
              </a>
              <a class="dropdown-item" href="<?= base_url('keranjang'); ?>">
                Keranjang Saya
              </a>
            <?php endif; ?>

            <hr>
            <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
              Log out
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- end navbar -->