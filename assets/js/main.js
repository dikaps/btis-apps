feather.replace();

let loadFile = (event) => {
  let img = document.querySelector('#img');
  img.src = URL.createObjectURL(event.target.files[0]);
  img.onload = () => {
    URL.revokeObjectURL(img.src);
  }
}

$(document).ready(function () {
  $("#detail").tooltip();
  $("#edit").tooltip();
  $("#tambah").tooltip();
  $("#hapus").tooltip();

  $('.alert-pesan').alert().delay(3000).slideUp();

  $("#dataTable").dataTable();



  const produk = document.querySelectorAll("#produk");
  let productName = document.getElementById("product-name");

  for (let i = 0; i < produk.length; i++) {
    let judul = produk[i].innerHTML;
    produk[i].onclick = function () {
      productName.innerHTML = judul;
    };
  }
  const deskripsi = new FroalaEditor('#deskripsi');

  $("#btn-nav").click(function (e) {
    e.preventDefault();
    $("#show").toggleClass('d-none');
    $("#hidden").toggleClass('d-none');
  });

  let card = document.querySelectorAll(".card");

  for (let i = 0; i < card.length; i++) {
    card[i].onmouseover = function () {
      card[i].classList.add("shadow-lg");
    };

    card[i].onmouseleave = function () {
      card[i].classList.remove("shadow-lg");
    };
  }

  // alamat
  $("#alamat").click(function (e) {
    e.preventDefault();
    $(this).addClass('text-blue');
    $(this).removeClass('text-white');
    $("#alamat-info").removeClass('d-none');

    $("#riwayat").addClass('text-white');
    $("#riwayatPesanan").addClass('d-none');

    $("#pesanan").addClass('text-white');
    $("#pesananSaya").addClass('d-none');
  });

  // riwayat
  $("#riwayat").click(function (e) {
    e.preventDefault();
    $(this).addClass('text-blue');
    $(this).removeClass('text-white');
    $("#riwayatPesanan").removeClass('d-none');


    $("#alamat").addClass('text-white');
    $("#alamat-info").addClass('d-none');


    $("#pesanan").addClass('text-white');
    $("#pesananSaya").addClass('d-none');
  });

  // pesanan
  $("#pesanan").click(function (e) {
    e.preventDefault();

    $(this).addClass('text-blue');
    $(this).removeClass('text-white');
    // console.log($("#pesananSaya"));
    $("#pesananSaya").removeClass('d-none');


    $("#alamat").addClass('text-white');
    $("#alamat-info").addClass('d-none');


    $("#riwayat").addClass('text-white');
    $("#riwayatPesanan").addClass('d-none');
  });

  // kontak
  $("#kontak").click(function (e) {
    e.preventDefault();

    $(this).addClass('text-blue');
    $(this).removeClass('text-white');
    $("#info-kontak").removeClass('d-none');


    $("#bank").addClass('text-white');
    $("#bank").removeClass('text-blue');
    $("#info-bank").addClass('d-none');
  });

  // bank
  $("#bank").click(function (e) {
    e.preventDefault();

    $(this).addClass('text-blue');
    $(this).removeClass('text-white');
    $("#info-bank").removeClass('d-none');


    $("#kontak").addClass('text-white');
    $("#info-kontak").addClass('d-none');
  });


  // ajax kategori 
  $('.btn-tambah').click(function (e) {
    e.preventDefault();
    $('.modal-title').html('Tambah Kategori');
    $('form').attr('action', 'http://localhost/btis-apps/produk/kategori');
    $('#nama_kategori').val('');
    $('.btn-toggle').html('Tambah');
  });

  $('.edit-kategori').on('click', function (e) {
    e.preventDefault();

    $('.modal-title').html('Edit Kategori');
    $('.btn-toggle').html('Edit');
    const id = $(this).data('id');

    $('form').attr('action', 'http://localhost/btis-apps/produk/editKategori/' + id);

    $.ajax({
      type: "post",
      url: "http://localhost/btis-apps/produk/getKategori",
      data: {
        id: id
      },
      dataType: "json",
      success: function (response) {
        $('#nama_kategori').val(response.nama_kategori);
      }
    });
  });

  $('.hapus-kategori').click(function (e) {
    e.preventDefault();
    const id = $(this).data('id');

    const href = 'http://localhost/btis-apps/produk/hapuskategori/' + id;

    $('#hapus-kategori').attr('href', href);
  });

  // produk 
  $('.hapus-produk').click(function (e) {
    e.preventDefault();
    const id = $(this).data('id');

    const href = 'http://localhost/btis-apps/produk/hapusproduk/' + id;

    $('#hapus-produk').attr('href', href);
  });


  // ajax diskon
  $('.tb-diskon').click(function (e) {
    e.preventDefault();
    $('.modal-title').html('Tambah Diskon');
    $('form').attr('action', 'http://localhost/btis-apps/produk/produkdiskon');
    $('#diskon').val('');
    $('.btn-toggle').html('Tambah');
    $("#is_active").attr('checked', 'checked');
  });

  $('.edit-diskon').on('click', function (e) {
    e.preventDefault();

    $('.modal-title').html('Edit Diskon');
    $('.btn-toggle').html('Edit');
    const id = $(this).data('id');

    $('form').attr('action', 'http://localhost/btis-apps/produk/editDiskon/' + id);

    $.ajax({
      type: "post",
      url: "http://localhost/btis-apps/produk/getDiskon",
      data: {
        id: id
      },
      dataType: "json",
      success: function (response) {
        $('#id_produk').val(response.id_produk);
        $('#diskon').val(response.besar_diskon);
        if (response.is_active == 0) {
          $("#is_active").removeAttr("checked");
        }
      }
    });
  });

  $('.hapus-diskon').click(function (e) {
    e.preventDefault();
    const id = $(this).data('id');

    const href = 'http://localhost/btis-apps/produk/hapusDiskon/' + id;

    $('#hapus-diskon').attr('href', href);
  });
});