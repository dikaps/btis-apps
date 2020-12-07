<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favorit extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('Favorit_model', 'favorit');
  }

  public function index()
  {
    $data['judul'] = "BTis | Favorit";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();

    $data['favorit'] = $this->favorit->getFav($data['user']['id_user']);
    $data['diskon'] = $this->favorit->getJoinDiskon();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('favorit/index', $data);
    $this->load->view('templates/footer');
  }

  public function add($id)
  {
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $favorit = $this->db->get_where('favorit', ['id_produk' => $id])->row_array('id_produk');
    // $favorit = $favorit['id_produk'];
    if (empty($favorit)) {

      $config = [
        'id_produk' => $id,
        'id_user' => $data['user']['id_user']
      ];

      $this->db->insert('favorit', $config);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Produk baru ditambahkan ke favorit anda.</div>');
      redirect('favorit');
    } else {
      if ($favorit['id_produk'] == $id) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-pesan">Produk sudah ada di daftar favorit anda.</div>');
        redirect('favorit');
        die;
      }
    }
  }

  public function delete($id)
  {
    $this->db->where('id_favorit', $id);
    $this->db->delete('favorit');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Produk favorit anda berhasil dihapus.</div>');
    redirect('favorit');
  }
}
