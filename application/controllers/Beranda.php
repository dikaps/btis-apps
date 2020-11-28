<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    cek_login();
  }
  public function index()
  {
    $data['judul'] = "BTis | Beranda";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->Produk_model->getOneData('kontak');

    $data['hero'] = $this->Produk_model->getMaxJual(2);
    $data['unggulan'] = $this->Produk_model->getMaxJual(6);
    $data['cek_diskon'] = $this->Produk_model->cekProdukDiskon();
    $data['diskon'] = $this->Produk_model->getDiskonJoin();
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('beranda', $data);
    $this->load->view('templates/footer', $data);
  }
}
