<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-12 bg-white">
      <div class="d-flex justify-content-center align-items-center hv-100">
        <div class="login-box">
          <div class="logo">
            <img src="<?= base_url('assets/img/BTis.png') ?>" alt="logo">
          </div>

          <div class="main">
            <h3 class="pb-3">Lupa Password.</h3>

            <form method="POST" autocomplete="off" <?= base_url('auth/updatePassword/'); ?>>
              <div class="form-group mb-4">
                <input type="password" name="new_password1" id="new_password1" placeholder="New Password" class="form-control">
                <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>

              </div>

              <div class="form-group">
                <input type="password" name="new_password2" id="new_password2" placeholder="Repeat New Password" class="form-control">
                <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>

              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-dark btn-block bg-darkMedium">Change Password</button>
              </div>
            </form>

          </div>
        </div>
      </div>

    </div>
    <div class="col-md-6 overflow-hidden">
      <div class="people-login"></div>
    </div>
  </div>
</div>