<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('beranda');
    }

    $data['hero'] = $this->Produk_model->getMaxJual(2);
    $data['unggulan'] = $this->Produk_model->getMaxJual(6);
    $data['diskon'] = $this->Produk_model->getDiskonJoin();

    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['judul'] = "BTis | Tamu";
    $this->load->view('tamu/index', $data);
  }
}
