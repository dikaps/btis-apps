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

                <a href="#" class="btn btn-sm btn-outline-info mb-2" data-toggle="tooltip" data-placement="top" title="Detail Kontak" id="detail">
                  <i data-feather="info"></i>
                </a>

                <a href="#" class="btn btn-sm btn-outline-warning mb-2" data-toggle="tooltip" data-placement="top" title="Edit Alamat" id="edit">
                  <i data-feather="edit"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div id="info-bank" class="d-none">
        <button type="button" data-toggle="modal" data-target="#modal-bank" class="btn btn-outline-light mt-3 mb-3">Tambah
          Akun Bank</button>

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
            <?php foreach ($bank as $b) : ?>
              <tr>
                <td>1</td>

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

                  <a href="#" class="btn btn-sm btn-outline-warning mb-2" data-toggle="tooltip" data-placement="top" title="Edit Alamat" id="edit">
                    <i data-feather="edit"></i>
                  </a>

                  <a href="#" class="btn btn-sm btn-outline-danger mb-2" data-toggle="tooltip" data-placement="top" title="Hapus Bank" id="hapus">
                    <i data-feather="trash"></i>
                  </a>
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
        <button type="button" data-toggle="modal" data-target="#modal-alamat" class="btn btn-outline-light mt-3 mb-3">Tambah
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
            <tr>
              <td>1</td>
              <td>
                Kp. Walahar 1 RT 009/003, Desa Bantarwaru, Kec. Gantar, Kab. Indramayu
              </td>
              <td>
                Andika Permana Sidiq
                <br>
                +62 853 2187 4357
              </td>
              <td>

                <a href="#" class="btn btn-sm btn-warning mb-2" data-toggle="tooltip" data-placement="top" title="Edit Alamat" id="edit">
                  <i data-feather="edit"></i>
                </a>

                <a href="#" class="btn btn-sm btn-danger mb-2" data-toggle="tooltip" data-placement="top" title="Hapus Alamat" id="hapus">
                  <i data-feather="trash"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div id="riwayatPesanan" class="d-none">
        <div class="r-produk mt-5">
          <div class="d-flex">
            <img src="assets/img/onigiri.jpg" alt="onigiri" class="img-fluid mr-3">


            <div class="text-white my-auto">
              <h2>kaos onigiri</h2>
              <p>Rp. 110.000 ,-</p>
              <p>1x</p>
              <p>01 / 04 / 2020</p>
            </div>

          </div>
        </div>
      </div>

      <div id="pesananSaya" class="d-none">
        <div class="r-produk mt-5">
          <div class="d-flex">
            <img src="assets/img/onigiri.jpg" alt="onigiri" class="img-fluid mr-3">


            <div class="text-white">
              <h3>Alamat</h3>
              <p>Kp. Walahar 1 RT 009/003, Desa Bantarwaru, Kec. Gantar, Kab. Indramayu</p>

              <h3 class="mt-3">Penerima</h3>

              <p>Andika Permana Sidiq</p>

              <h3 class="mt-3">No. Telepon</h3>
              <p>+62 853 2187 4357</p>

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
                    <td>J&T Express</td>
                    <td>JP9397746562</td>
                  </tr>
                </tbody>
              </table>

              <button class="btn btn-outline-light mt-2">Diterima</button>
            </div>

          </div>
        </div>
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
          <form method="POST" action="" class="mt-3" enctype="multipart/form-data">
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
              <input type="number" name="phone" id="phone" class="form-control input-profile" value="<?= $user['nomer_telp']; ?>">

              <div class="icon">
                <i data-feather="phone"></i>
              </div>
            </div>

            <div class="form-group">
              <input type="date" name="ttl" id="ttl" class="form-control input-profile">

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

<!-- modal for address -->
<div class="modal fade" id="modal-alamat" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">tambah alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form method="POST" action="">
            <div class="form-group">
              <input type="text" name="alamat" id="alamat" class="form-control input-profile" placeholder="Alamat">

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
              <input type="text" name="nomer_penerima" id="nomer_penerima" class="form-control input-profile" placeholder="Nomer Penerima">

              <div class="icon">
                <i data-feather="phone"></i>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>