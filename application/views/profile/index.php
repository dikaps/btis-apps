<header class="jumbotron-fluid hero hero-user">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-12">
        <div class="d-flex justify-content-center">
          <img src="<?= base_url('assets/img/profile/') . $user['foto_profil']; ?>" alt="profile" class=" img-profile">
        </div>
      </div>
      <div class="col-md-7 col-12 text-white t-center">
        <h2 class="display-4"><?= $user['username']; ?></h2>
        <p>
          <i data-feather="mail" class="mr-2"></i>
          <?= $user['email']; ?>
        </p>
        <p>
          <i data-feather="phone" class="mr-2"></i>
          <?php if ($user['nomer_telp']) : ?>
            <?= $user['nomer_telp']; ?>
          <?php else : ?>
            <small class="text-light">Nomer Telepon belum ditambahkan</small>
          <?php endif; ?>
        </p>

        <button type="button" data-toggle="modal" data-target="#editProfile" class="btn btn-outline-light">EDIT
          PROFILE</button>
      </div>
    </div>
  </div>
</header>

<?php if (validation_errors()) : ?>
  <div class="container">
    <div class="row">
      <div class="alert alert-danger alert-pesan" role="alert"><?= validation_errors(); ?></div>

    </div>
  </div>
<?php endif; ?>
<div class="container mt-5">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
  </div>
</div>


<?php if ($this->session->userdata('role_id') == 1) : ?>
  <section class="info-users">
    <div class="container">
      <div class="d-flex">
        <h5 class="mr-5">
          <a href="#" class="text-blue" id="kontak">Kontak</a>
        </h5>
        <h5 class="mr-5">
          <a href="#" class="text-white" id="bank">Bank</a>
        </h5>
      </div>

      <div id="info-kontak">
        <table class="table table-borderless text-white">
          <thead>
            <tr>
              <th>#</th>
              <th>Alamat</th>
              <th>Whatsapp</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>
                <?= $kontak['alamat']; ?>
              </td>
              <td>
                <?= $kontak['telepon']; ?>
              </td>
              <td>
                <button type="button" data-toggle="modal" data-target="#modal-alamat" class="btn btn-sm btn-outline-info mb-2 info-kontak">
                  <i data-feather="info"></i>
                </button>

                <button type="button" data-toggle="modal" data-target="#modal-alamat" class="btn btn-sm btn-outline-warning mb-2 edit-kontak">
                  <i data-feather="edit"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div id="info-bank" class="d-none">
        <button type="button" data-toggle="modal" data-target="#modal-bank" class="btn btn-outline-light mt-3 mb-3 tambah-bank">Tambah Akun Bank</button>

        <table class="table table-borderless text-white">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Bank</th>
              <th>Nomer Rekening</th>
              <th>Atas Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1;
            foreach ($bank as $b) : ?>
              <tr>
                <td><?= $i++; ?></td>

                <td>
                  <?= $b['nama_bank']; ?>
                </td>

                <td>
                  <?= $b['norek']; ?>
                </td>

                <td>
                  <?= $b['atas_nama']; ?>
                </td>

                <td>

                  <button type="button" data-id="<?= $b['id_bank']; ?>" data-toggle="modal" data-target="#modal-bank" class="btn btn-sm btn-outline-warning mb-2 edit-bank">
                    <i data-feather="edit"></i>
                  </button>

                  <button type="button" data-id="<?= $b['id_bank']; ?>" data-toggle="modal" data-target="#hapus-bank" class="btn btn-sm btn-outline-danger mb-2 hapusBank">
                    <i data-feather="trash"></i>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
<?php else : ?>
  <section class="info-users">
    <div class="container">
      <div class="d-flex">
        <h5 class="mr-5">
          <a href="" class="text-blue" id="alamat">Alamat Saya</a>
        </h5>
        <h5 class="mr-5">
          <a href="" class="text-white" id="riwayat">Riwayat Pemesanan</a>
        </h5>
        <h5 class="mr-5">
          <a href="#" class="text-white" id="pesanan">Pesanan Saya</a>
        </h5>
      </div>



      <div id="alamat-info">
        <button type="button" data-toggle="modal" data-target="#modal-alamat" class="btn btn-outline-light mt-3 mb-3 tambah-alamat">Tambah
          Alamat</button>

        <table class="table table-borderless text-white">
          <thead>
            <tr>
              <th>#</th>
              <th>Alamat</th>
              <th>Penerima</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1;
            foreach ($alamat as $al) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td>
                  <?= $al['alamat']; ?>
                </td>
                <td>
                  <?= $al['penerima']; ?>
                  <br>
                  <?= $al['telepon_penerima']; ?>
                </td>
                <td>
                  <button type="button" data-id="<?= $al['id_alamat']; ?>" data-toggle="modal" data-target="#modal-alamat" class="btn btn-warning btn-sm mb-2 edit-alamat">
                    <i data-feather="edit"></i>
                  </button>


                  <button type="button" data-id="<?= $al['id_alamat']; ?>" data-toggle="modal" data-target="#delete-alamat" class="btn btn-danger btn-sm mb-2 delete-alamat">
                    <i data-feather="trash"></i>
                  </button>
                </td>
              </tr>
          </tbody>
        <?php endforeach; ?>
        </table>
      </div>

      <div id="riwayatPesanan" class="d-none">
        <?php foreach ($riwayat as $r) : ?>
          <div class="r-produk mt-5">
            <div class="d-flex">
              <img src="<?= base_url('assets/img/produk/') . $r['foto_produk']; ?>" class="img-fluid mr-3">


              <div class="text-white my-auto">
                <h2 class="text-bold"><?= $r['nama_produk']; ?></h2>
                <p>Rp. <?= rupiah($r['total_bayar']); ?> ,-</p>
                <p>Jumlah Beli <?= $r['jml_beli']; ?>x</p>
                <p>Ukuran Produk <?= $r['ukuran_produk']; ?></p>
                <p>
                  <?php
                  $tgl = $r['id_pesanan'];
                  $tgl = explode('-', $tgl);
                  $tgl = end($tgl);
                  $tgl = date('d M Y', $tgl);
                  echo $tgl;
                  ?>
                </p>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div id="pesananSaya" class="d-none pesananSaya">
        <?php foreach ($pesanan as $p) : ?>
          <div class="r-produk mt-5">
            <div class="d-flex">
              <img src="<?= base_url('assets/img/produk/') . $p['foto_produk']; ?>" alt="onigiri" class="img-fluid mr-3">


              <div class="text-white">
                <h3>Alamat</h3>
                <p class="text-nowrap"><?= $p['alamat']; ?></p>

                <h3 class="mt-3">Penerima</h3>

                <p><?= $p['penerima']; ?></p>

                <h3 class="mt-3">No. Telepon</h3>
                <p><?= $p['telepon_penerima']; ?></p>

                <table class="table table-borderless ml-n2 text-white">
                  <thead>
                    <tr>
                      <th>
                        <h3>
                          Total Bayar
                        </h3>
                      </th>
                      <th>
                        <h3>
                          Ukuran Yang dipesan
                        </h3>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td class="text-nowrap">Rp. <?= rupiah($p['total_bayar']); ?>,-</td>
                      <td class="text-nowrap">
                        <?= $p['ukuran_produk']; ?>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-borderless ml-n2 text-white">
                  <thead>
                    <tr>
                      <th>
                        <h3>
                          Kurir
                        </h3>
                      </th>
                      <th>
                        <h3>
                          No Resi
                        </h3>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td class="text-nowrap"><?= $p['kurir']; ?></td>
                      <td class="text-nowrap">
                        <?php if (empty($p['resi_pengiriman'])) : ?>
                          Belum ada
                        <?php else : ?>
                          <?= $p['resi_pengiriman']; ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <?php if ($p['status_pembayaran'] == 1) : ?>
                  <form action="<?= base_url('keranjang/updateStatusPengiriman/'); ?>" method="POST">
                    <input type="hidden" name="id_pesanan" value="<?= $p['id_pesanan']; ?>">
                    <input type="hidden" name="id_produk" value="<?= $p['id_produk']; ?>">
                    <button class="btn btn-outline-light mt-2">Diterima</button>
                  </form>
                <?php else : ?>
                  <button class="btn btn-outline-light text-uppercase mr-3 ambil-id" data-id="<?= $p['id_pesanan']; ?>" data-toggle="modal" data-target="#bayar">upload
                    bukti transfer</button>
                <?php endif; ?>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>
<?php endif; ?>

<!-- modal for edit profile -->
<div class="modal fade" id="editProfile" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">edit profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row justify-content-center">
            <img src="<?= base_url('assets/img/profile/') . $user['foto_profil']; ?>" alt="" class="img-fluid shadow">

          </div>
          <form method="POST" action="" class="mt-3" enctype="multipart/form-data" autocomplete="on">
            <div class="form-group">
              <input type="text" name="nama" id="nama" class="form-control input-profile" value="<?= $user['username']; ?>">

              <div class="icon">
                <i data-feather="user"></i>
              </div>
            </div>

            <div class="form-group">
              <input type="text" name="email" id="email" class="form-control input-profile" value="<?= $user['email']; ?>" readonly>

              <div class="icon">
                <i data-feather="mail"></i>
              </div>
            </div>

            <div class="form-group">
              <input type="text" name="phone" id="phone" class="form-control input-profile" value="<?= $user['nomer_telp']; ?>">

              <div class="icon">
                <i data-feather="phone"></i>
              </div>
            </div>

            <div class="form-group">
              <input type="date" name="ttl" id="ttl" class="form-control input-profile" value="<?= $user['tanggal_lahir']; ?>">

              <div class="icon calendar">
                <i data-feather="calendar"></i>
              </div>
            </div>

            <div class="form-group">
              <label for="foto">Foto Profile</label>
              <input type="file" name="foto" id="foto" class="custom-file">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php if ($this->session->userdata('role_id') == 1) : ?>
  <!-- modal for address -->
  <div class="modal fade" id="modal-alamat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title title-info">edit profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="POST" action="<?= base_url('profile/editKontak'); ?>" class="mt-3">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $kontak['alamat']; ?>">
              </div>

              <div class="form-group">
                <label for="facebook">Link Facebook</label>
                <input type="text" name="facebook" id="facebook" class="form-control" value="<?= $kontak['facebook']; ?>">
              </div>

              <div class="form-group">
                <label for="instagram">Link Instagram</label>
                <input type="text" name="instagram" id="instagram" class="form-control" value="<?= $kontak['instagram']; ?>">
              </div>

              <div class="form-group">
                <label for="telepon">Nomer Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control" value="<?= $kontak['telepon']; ?>">
              </div>

              <div class="form-group">
                <label for="line">Id Line</label>
                <input type="text" name="line" id="line" class="form-control" value="<?= $kontak['line']; ?>">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-save">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- modal for address -->
  <div class="modal fade" id="modal-bank" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title title-bank">tambah bank</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="POST" action="<?= base_url('profile/tambahbank'); ?>" class="mt-3 form-bank">
              <div class="form-group">
                <label for="nama_bank">Nama Bank</label>
                <input type="text" name="nama_bank" id="nama_bank" class="form-control">
              </div>

              <div class="form-group">
                <label for="norek">Nomer Rekening</label>
                <input type="text" name="norek" id="norek" class="form-control">
              </div>

              <div class="form-group">
                <label for="atas_nama">Atas Nama</label>
                <input type="text" name="atas_nama" id="atas_nama" class="form-control">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-bank">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- modal for delete account bank -->
  <div class="modal fade" id="hapus-bank" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">hapus akun bank</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="lead">Yakin mau dihapus?</p>
        </div>
        <div class=" modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Tutup
          </button>
          <a href="#" class="btn btn-danger" id="dl-bank">Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php else : ?>
  <!-- modal for address -->
  <div class="modal fade" id="modal-alamat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title title-alamat">tambah alamat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="POST" action="<?= base_url('profile/addAlamat') ?>" class="form-alamat" autocomplete="off">
              <div class="form-group">
                <input type="text" id="alamat-penerima" name="alamat" class="form-control input-profile" placeholder="Alamat">

                <div class="icon">
                  <i data-feather="map-pin"></i>
                </div>
              </div>

              <div class="form-group">
                <input type="text" name="penerima" id="penerima" class="form-control input-profile" placeholder="Penerima">

                <div class="icon">
                  <i data-feather="user"></i>
                </div>
              </div>

              <div class="form-group">
                <input type="text" name="telepon_penerima" id="nomer_penerima" class="form-control input-profile" placeholder="Nomer Penerima">

                <div class="icon">
                  <i data-feather="phone"></i>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary btn-tambahAlamat">Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- modal for delete account bank -->
  <div class="modal fade" id="delete-alamat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">hapus alamat anda?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="lead">Yakin mau dihapus?</p>
        </div>
        <div class=" modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Tutup
          </button>
          <a href="#" class="btn btn-danger" id="dl-alamat">Hapus</a>
        </div>
      </div>
    </div>
  </div>

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
            <form action="<?= base_url('keranjang/uploadTransfer/'); ?>" method="POST" enctype="multipart/form-data" class="form-upload">


              <div class="form-group text-center">
                <input type="file" name="bukti-tf" id="bukti-tf" class="form-control-file">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>