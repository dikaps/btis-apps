<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-12 bg-white">
      <div class="d-flex justify-content-center align-items-center hv-100">
        <div class="login-box">
          <div class="logo">
            <img src="<?= base_url(); ?>assets/img/BTis.png" alt="logo">
          </div>

          <div class="main">
            <?= $this->session->flashdata('pesan'); ?>
            <h3>Log in.</h3>
            <p>Halo Selamat Datang Kembali di PikaShop. </p>
            <form method="POST" autocomplete="off">
              <div class="form-group mb-4">
                <input type="text" name="email" id="email" placeholder="Email" class="form-control" autofocus value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                <div class="icon-eye">
                  <i data-feather="eye" id="icon"></i>
                  <i data-feather="eye-off" id="icon1" class="d-none"></i>
                  <input type="checkbox" id="check">
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-dark btn-block bg-darkMedium">Log in</button>
              </div>
            </form>

            <div class="mt-4 text-center">
              <p>Belum Punya Akun? <a href="<?= base_url('auth/registrasi') ?>" class="text-blue">Daftar Yuk.</a></p>
              <a href="<?= base_url('auth/lupaPassword'); ?>" class="text-blue">Lupa Password?</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-6 overflow-hidden">
      <div class="people-login"></div>
    </div>
  </div>
</div>