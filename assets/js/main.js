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

	// kontak 
	$('.info-kontak').click(function (e) {
		e.preventDefault();
		console.log('cliked');

		$('#alamat').attr('readonly', 'readonly');
		$('#facebook').attr('readonly', 'readonly');
		$('#instagram').attr('readonly', 'readonly');
		$('#telepon').attr('readonly', 'readonly');
		$('#line').attr('readonly', 'readonly');

		$('.btn-save').addClass('d-none');
		$('.title-info').html('Detail Kontak');
	});

	$('.edit-kontak').click(function (e) {
		e.preventDefault();
		console.log('cliked');

		$('#alamat').removeAttr('readonly');
		$('#facebook').removeAttr('readonly');
		$('#instagram').removeAttr('readonly');
		$('#telepon').removeAttr('readonly');
		$('#line').removeAttr('readonly');

		$('.btn-save').removeClass('d-none');
		$('.title-info').html('Edit Kontak');
	});

	// ajax bank
	$('.tambah-bank').click(function (e) {
		e.preventDefault();
		$('.title-bank').html('Tambah Bank');
		$('.btn-bank').html('Save changes');
		$('.form-bank').attr('action', 'http://localhost/btis-apps/profile/tambahbank');

		$('#nama_bank').val('');
		$('#norek').val('');
		$('#atas_nama').val('');
	});

	$('.edit-bank').on('click', function (e) {
		e.preventDefault();

		$('.title-bank').html('Edit Akun Bank');
		$('.btn-bank').html('Edit');
		// $('.btn-toggle').html('Edit');
		const id = $(this).data('id');
		console.log(id);

		$('.form-bank').attr('action', 'http://localhost/btis-apps/profile/editbank/' + id);

		$.ajax({
			type: "post",
			url: "http://localhost/btis-apps/profile/getBank",
			data: {
				id: id
			},
			dataType: "json",
			success: function (response) {
				$('#nama_bank').val(response.nama_bank);
				$('#norek').val(response.norek);
				$('#atas_nama').val(response.atas_nama);
			}
		});
	});

	$('.hapusBank').click(function (e) {
		e.preventDefault();
		const id = $(this).data('id');
		console.log(id);

		const href = 'http://localhost/btis-apps/profile/hapusBank/' + id;

		$('#dl-bank').attr('href', href);
	});

	// konfimasi alamat
	$('#konfirmasi-alamat').on('change', function () {

		const id = $('#konfirmasi-alamat option:selected').val();
		console.log(id);
		$.ajax({
			type: "post",
			url: "http://localhost/btis-apps/keranjang/getAlamat",
			data: {
				id: id
			},
			dataType: "json",
			success: function (response) {
				// console.log(response);
				$('#penerima').html(response.penerima);
				$('#alamat-penerima').html(response.alamat);
				$('#telepon-penerima').html(response.telepon_penerima);
			}
		});
	});

	// ajax alamat
	$('.tambah-alamat').click(function (e) {
		e.preventDefault();
		$('.title-alamat').html('tambah alamat');
		$('.btn-tambahAlamat').html('Tambah');
		$('.form-alamat').attr('action', 'http://localhost/btis-apps/profile/addAlamat');

		$('#alamat-penerima').val('');
		$('#penerima').val('');
		$('#nomer_penerima').val('');
	});

	$('.edit-alamat').on('click', function (e) {
		e.preventDefault();
		$('.title-alamat').html('edit alamat');
		$('.btn-tambahAlamat').html('Edit');

		const id = $(this).data('id');
		console.log(id);

		$('.form-alamat').attr('action', 'http://localhost/btis-apps/profile/editalamat/' + id);

		$.ajax({
			type: "post",
			url: "http://localhost/btis-apps/profile/getAlamat",
			data: {
				id: id
			},
			dataType: "json",
			success: function (response) {
				console.log(response);
				$('#alamat-penerima').val(response.alamat);
				$('#penerima').val(response.penerima);
				$('#nomer_penerima').val(response.telepon_penerima);
			}
		});
	});

	$('.delete-alamat').click(function (e) {
		e.preventDefault();
		const id = $(this).data('id');

		const href = 'http://localhost/btis-apps/profile/hapusAlamat/' + id;

		$('#dl-alamat').attr('href', href);
	});

	// pesanan
	$('.ambil-id').click(function (e) {
		e.preventDefault();
		const id = $(this).data('id');

		const href = 'http://localhost/btis-apps/keranjang/uploadTransfer/' + id;

		$('.form-upload').attr('action', href);
	});

	$('.kategori-produk').on('click', function (e) {
		e.preventDefault();

		const id = $(this).data('id');
		const nama = $(this).data('nama');
		$(this).addClass('text-danger');
		$(this).css('pointer-events', 'none');
		console.log(id);

		$('#product-name').html('<strong>' + nama + '</strong> ditambahkan ke list');
		$('#product-name').addClass('nama');

		$.ajax({
			type: "post",
			url: "http://localhost/btis-apps/produk/getProduk",
			data: {
				id: id
			},
			dataType: "json",
			success: function (response) {

				let card = document.getElementById('card');
				for (let i = 0; i < response.length; i++) {


					let cardRow = '<div class="col-md-4 col-6"><div class="card shadow w-80" style="margin-bottom:2.5rem"><div class="card-body"><div class="d-flex justify-content-center"><img src="http://localhost/btis-apps/assets/img/produk/' + response[i].foto_produk + '" alt="" class="img-fluid mb-4 shadow"></div><div class="text-center"><h3>' + response[i].nama_produk + '</h3><p>Rp. ' + response[i].harga + ' </p></div><div class="d-flex justify-content-center"><a href="http://localhost/btis-apps/produk/dProduk/' + response[i].id_produk + '" class="btn btn-cart-produk btn-dark">Lihat</a></div></div></div></div >';

					card.innerHTML += cardRow;
				}
			}
		});
	});

	$('#refresh').click(function () {
		location.reload();
		console.log('hashah');
	});

	$('.button-resi').click(function (e) {
		e.preventDefault();
		const id = $(this).data('id');

		$('#id-pesanan').val(id);

		$.ajax({
			type: "post",
			url: "http://localhost/btis-apps/pesanan/getResi",
			data: {
				id: id
			},
			dataType: "json",
			success: function (response) {
				$('#resi').val(response.resi_pengiriman);
			}
		});
	});

	$('.edit-resi').click(function (e) {
		e.preventDefault();

		$('.form-resi').attr('action', 'http://localhost/btis-apps/pesanan/updateResi');

		const idPesanan = $('#id-pesanan').val();
		const resi = $('#resi').val();

		$.ajax({
			type: "post",
			url: "http://localhost/btis-apps/pesanan/updateResi",
			data: {
				idPesanan: idPesanan,
				resiPengiriman: resi
			},
			dataType: "json",
			success: function (response) {
				$('#pesan').removeClass('d-none');
				$('#pesan').delay(3000).slideUp();
				$('#pesan').html('Resi berhasil di tambahkan');
			}
		});
	});
});
