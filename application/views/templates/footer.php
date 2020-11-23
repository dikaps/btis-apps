<footer>
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-6">
        <h2>BTis</h2>
        <p><?= $kontak['alamat']; ?></p>
      </div>
      <div class="col-md-6">
        <h2>Social Media</h2>

        <a href="<?= $kontak['facebook']; ?>" class="mr-3">
          <i data-feather="facebook"></i>
        </a>
        <a href="<?= $kontak['instagram']; ?>">
          <i data-feather="instagram"></i>
        </a>
      </div>

      <div class="col-md-6 mt-5">
        <h2>Kontak Kami</h2>

        <div class="d-flex flex-column">
          <div class="mb-3">
            <i data-feather="phone" class="mr-2"></i>
            <?= $kontak['telepon']; ?>
          </div>
          <div class="mb-3">
            <img src="<?= base_url('assets/'); ?>img/line.png" width="25px" class="mr-2">
            <?= $kontak['line']; ?>
          </div>
          <div class="mb-3">
            <i data-feather="mail" class="mr-2"></i>
            <?= $kontak['email']; ?>
          </div>
        </div>
      </div>
    </div>
    <span class="mt-5 mb-5 float-right">
      Crafted with <span class="text-danger">♥</span> by dIkaps
    </span>
  </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/feather.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/froala_editor.pkgd.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/datatables.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/main.js"></script>

</body>

</html>