<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Block extends CI_Controller
{
  public function index()
  {
    $data['judul'] = "Blocked";
    $this->load->view('templates/auth_header', $data);
    $this->load->view('block/index');
    $this->load->view('templates/auth_footer');
  }
  public function forbidden()
  {
    $data['judul'] = "Blocked";
    $this->load->view('templates/auth_header', $data);
    $this->load->view('block/gagal');
    $this->load->view('templates/auth_footer');
  }
}
