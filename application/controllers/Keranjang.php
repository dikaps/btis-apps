<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('Keranjang_model', 'keranjang');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['judul'] = "BTis | Keranjang Saya";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();


    $data['keranjang'] = $this->keranjang->getKeranjangJoin($data['user']['id_user']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('keranjang/index');
    $this->load->view('templates/footer', $data);
  }

  public function add()
  {

    $data = [
      'id_produk' => $this->input->post('id_produk', true),
      'ukuran' => $this->input->post('ukuran', true),
      'jml_beli' => $this->input->post('jml_beli', true),
      'id_user' => $this->input->post('id_user', true),
    ];

    $this->db->insert('keranjang', $data);
    redirect('keranjang');
  }

  public function delete($id)
  {
    $this->db->delete('keranjang', ['id_keranjang' => $id]);
    redirect('keranjang');
  }

  public function konfirmasiBayar($id)
  {
    $data['judul'] = "BTis | Keranjang Saya";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();


    $data['produk'] = $this->keranjang->getProdukJoin($id);

    $data['alamat'] = $this->db->get_where('alamat', ['id_user' => $data['user']['id_user']])->result_array();
    $data['bank'] = $this->db->get('bank')->result_array();
    $data['diskon'] = $this->db->get_where('diskon', ['id_produk' => $data['produk']['id_produk']])->row_array();

    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
      'required' => 'Alamat belum terpilih'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('keranjang/konfirmasi-bayar', $data);
      $this->load->view('templates/footer', $data);
    } else {

      $data = [
        'id_pesanan' => 'ps-' . $data['user']['id_user'] . '-' . time(),
        'id_produk' => $this->input->post('id_produk', true),
        'id_alamat' => $this->input->post('alamat', true),
        'id_bank' => $this->input->post('bank', true),
        'id_user' => $data['user']['id_user'],
        'ukuran_produk' => $this->input->post('ukuran_produk', true),
        'jml_beli' => $this->input->post('jml_beli', true),
        'total_bayar' => $this->input->post('total_bayar', true)
      ];

      $this->db->insert('pesanan', $data);
      $produk = $this->db->get_where('produk', ['id_produk' => $this->input->post('id_produk', true)])->row_array();
      $keranjang = $this->db->get_where('keranjang', ['id_keranjang' => $this->input->post('id_keranjang', true)])->row_array();
      $stok = $produk['stok'];
      $stok -= $keranjang['jml_beli'];
      $this->db->delete('keranjang', ['id_keranjang' => $this->input->post('id_keranjang', true)]);

      $this->db->set('stok', $stok);
      $this->db->where('id_produk', $produk['id_produk']);
      $this->db->update('produk');
      redirect(base_url('keranjang/bayar/') . $data['id_pesanan']);
    }
  }

  public function bayar($id)
  {
    $data['judul'] = "BTis | Bayar";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();


    $data['pesanan'] = $this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array();
    $data['bank'] = $this->db->get_where('bank', ['id_bank' => $data['pesanan']['id_bank']])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('keranjang/bayar', $data);
    $this->load->view('templates/footer', $data);
  }

  public function uploadTransfer($id)
  {
    $upload = $_FILES['bukti-tf']['name'];
    if ($upload) {
      $config['upload_path']          = './assets/img/transfer';
      $config['allowed_types']        = 'jpeg|jpg|png';
      $config['max_size']             = 2048;
      $config['file_name']            = 'bukti' . date('YmdHis');


      $this->load->library('upload', $config);

      if ($this->upload->do_upload('bukti-tf')) {
        $this->db->set('bukti_transfer', $this->upload->data('file_name'));
        $this->db->set('status_pembayaran', 1);
        $this->db->where('id_pesanan', $id);
        $this->db->update('pesanan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan col">Terima Kasih telah memesan, silahkan tunggu no resi nya nanti.</div>');
        redirect('profile');
      } else {
        echo $this->upload->display_errors();
      }
    }
  }

  public function updateStatusPengiriman()
  {
    $id = $this->input->post('id_pesanan', true);
    $idProduk = $this->input->post('id_produk', true);

    // pesanan
    $this->db->set('status_pemesanan', 1);
    $this->db->set('status_pengiriman', 1);
    $this->db->where('id_pesanan', $id);
    $this->db->update('pesanan');

    // produk
    $produk = $this->db->get_where('produk', ['id_produk' => $idProduk])->row_array();
    $terjual = $produk['terjual'];
    $terjual += 1;


    $this->db->set('terjual', $terjual);
    $this->db->where('id_produk', $idProduk);
    $this->db->update('produk');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan col">Terima Kasih telah belanja di toko kami.</div>');
    redirect('profile');
  }

  public function getAlamat()
  {
    $id = $this->input->post('id', true);

    $this->db->where('id_alamat', $id);
    echo json_encode($this->db->get('alamat')->row_array());
  }
}
