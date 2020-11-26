<section class="container mt-n5">
  <h2 class="text-bold text-uppercase">Pembayaran</h2>
  <p class="text-white mb-5">Anda memilih pembayaran dengan Bank <?= $bank['nama_bank']; ?>, Silahkan transfer ke Nomor Rekening di bawah
  </p>

  <div class="row align-items-center flex-column text-white">
    <h1 class="mb-2"><?= $bank['norek']; ?></h1>
    <p class="display-5">A/N <?= $bank['atas_nama']; ?></p>

    <div class="d-flex group">
      <button class="btn btn-outline-light text-uppercase mr-3" data-toggle="modal" data-target="#bayar">upload
        bukti transfer</button>
      <a href="<?= base_url('profile'); ?>" class="text-lead text-white text-uppercase mt-2">kembali ke pesanan saya</a>
    </div>
  </div>


</section>

<!-- modal for upload transfer -->
<div class="modal fade" id="bayar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Bukti transfer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <?= form_open_multipart('keranjang/uploadTransfer/' . $pesanan['id_pesanan']); ?>
          <div class="form-group text-center">
            <input type="file" name="bukti-tf" id="bukti-tf" class="form-control-file">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>