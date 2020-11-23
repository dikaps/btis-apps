<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function index()
  {
    $data['judul'] = "BTis | Profile";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();

    $data['bank'] = $this->db->get('bank')->result_array();

    // $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('phone', 'Nomer Telepon', 'numeric|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('profile/index');
      $this->load->view('templates/footer');
    } else {
      $this->User_model->updateProfile($data['user']['foto_profil'], $data['user']['email'], $_FILES);
    }
  }
}
