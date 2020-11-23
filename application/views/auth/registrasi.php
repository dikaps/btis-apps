  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-12 bg-white">
        <div class="d-flex justify-content-center align-items-center hv-100">
          <div class="login-box">
            <div class="logo">
              <img src="<?= base_url(); ?>assets/img/BTis.png" alt="logo">
            </div>

            <div class="main">
              <h3>Registrasi.</h3>
              <p>Halo Selamat Datang di PikaShop. <br>
                Silahkan Isi sesaui dengan data yang benar</p>

              <form method="POST" autocomplete="off">
                <div class="form-group mb-4">
                  <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" autofocus value="<?= set_value('nama'); ?>">
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group mb-4">
                  <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?= set_value('email'); ?>">
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
                  <button type="submit" class="btn btn-dark btn-block bg-darkMedium">Registrasi</button>
                </div>
              </form>

              <div class="mt-4 text-center">
                <p>Sudah Punya Akun? <a href="<?= base_url('auth') ?>" class="text-blue">Login.</a></p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-6 overflow-hidden">
        <div class="people-registrasi"></div>
      </div>
    </div>
  </div>