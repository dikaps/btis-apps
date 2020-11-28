<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
  }

  public function index()
  {
    cek_admin();
    $data['judul'] = "BTis | Daftar Pesanan Baru";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());
    $data['pesanan_baru'] = $this->Pesanan_model->getStatusPesananBaru();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('pesanan/index');
    $this->load->view('templates/footer', $data);
  }

  public function detailPesanan($id)
  {
    cek_admin();
    $data['judul'] = "BTis | Daftar Pesanan Baru";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());

    $data['pesanan'] = $this->Pesanan_model->getPesananId($id);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('pesanan/detail-pesanan', $data);
    $this->load->view('templates/footer', $data);
  }

  public function getResi()
  {
    $id = $this->input->post('id', true);

    echo json_encode($this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array());
  }

  public function updateResi()
  {
    $idPesanan = $this->input->post('idPesanan', true);
    $resi = $this->input->post('resiPengiriman', true);

    $this->db->set('resi_pengiriman', $resi);
    $this->db->set('status_pengiriman', 1);
    $this->db->where('id_pesanan', $idPesanan);
    $this->db->update('pesanan');
    $info = 'berhasil';
    echo json_encode($info);
  }

  public function dikirim()
  {
    cek_admin();
    $data['judul'] = "BTis | Daftar Pesanan Dikirim";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());
    $data['pesanan'] = $this->Pesanan_model->getStatusPesananDikirim();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('pesanan/dikirim');
    $this->load->view('templates/footer', $data);
  }

  public function selesai()
  {
    cek_admin();
    $data['judul'] = "BTis | Daftar Pesanan Selesai";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());

    $data['pesanan'] = $this->Pesanan_model->getStatusPesananSelesai();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('pesanan/selesai');
    $this->load->view('templates/footer', $data);
  }
}
