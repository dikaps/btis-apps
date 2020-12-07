<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('Keranjang_model', 'keranjang');
  }

  public function index()
  {
    $data['judul'] = "BTis | Profile";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());

    $data['bank'] = $this->db->get('bank')->result_array();
    $data['alamat'] = $this->db->get_where('alamat', ['id_user' => $data['user']['id_user']])->result_array();


    $data['pesanan'] = $this->Pesanan_model->getPesananWhere(0, $data['user']['id_user']);
    $data['riwayat'] = $this->Pesanan_model->getPesananWhere(1, $data['user']['id_user']);




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

  public function editKontak()
  {
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $config = [
      'alamat' => htmlspecialchars($this->input->post('alamat', true)),
      'facebook' => $this->input->post('facebook', true),
      'instagram' => $this->input->post('instagram', true),
      'telepon' => $this->input->post('telepon', true),
      'line' => $this->input->post('line', true)
    ];

    $this->db->where('id_user', $data['user']['id_user']);
    $this->db->update('kontak', $config);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Kontak berhasil dirubah!</div>');
    redirect('profile');
  }

  // bank
  public function tambahBank()
  {
    $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim|is_unique[bank.nama_bank]');
    $this->form_validation->set_rules('norek', 'Nomor Rekening', 'required|trim|numeric');
    $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan col">Ada kesalahan dalam penginputan akun bank!</div>');
      redirect('profile');
    } else {
      $data = [
        'nama_bank' => htmlspecialchars($this->input->post('nama_bank', true)),
        'norek' => htmlspecialchars($this->input->post('norek', true)),
        'atas_nama' => htmlspecialchars($this->input->post('atas_nama', true))
      ];

      $this->db->insert('bank', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan col">Akun Bank baru berhasil ditambahkan!</div>');
      redirect('profile');
    }
  }

  public function getBank()
  {
    $id = $this->input->post('id', true);
    echo json_encode($this->db->get_where('bank', ['id_bank' => $id])->row_array());
  }

  public function editBank($id)
  {
    $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim');
    $this->form_validation->set_rules('norek', 'Nomor Rekening', 'required');
    $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan col">Ada kesalahan dalam penginputan bank!</div>');
      redirect('profile');
    } else {
      $data = [
        'nama_bank' => htmlspecialchars($this->input->post('nama_bank', true)),
        'norek' => htmlspecialchars($this->input->post('norek', true)),
        'atas_nama' => htmlspecialchars($this->input->post('atas_nama', true))
      ];

      $this->db->where('id_bank', $id);
      $this->db->update('bank', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan col">Akun Bank berhasil diubah!</div>');
      redirect('profile');
    }
  }

  public function hapusBank($id)
  {
    $this->db->where('id_bank', $id);
    $this->db->delete('bank');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan col">Akun Bank berhasil dihapus!</div>');
    redirect('profile');
  }

  // alamat user
  public function addAlamat()
  {
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));

    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
    $this->form_validation->set_rules('telepon_penerima', 'Nomer Penerima', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan col">Ada kesalahan dalam penginputan alamat!</div>');
      redirect('profile');
    } else {
      $data = [
        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        'penerima' => htmlspecialchars($this->input->post('penerima', true)),
        'telepon_penerima' => htmlspecialchars($this->input->post('telepon_penerima', true)),
        'id_user' => $data['user']['id_user']
      ];
      $this->db->insert('alamat', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan col">Alamat baru berhasil ditambahkan.</div>');
      redirect('profile');
    }
  }

  public function getAlamat()
  {
    $id = $this->input->post('id', true);
    echo json_encode($this->db->get_where('alamat', ['id_alamat' => $id])->row_array());
  }

  public function editAlamat($id)
  {
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
    $this->form_validation->set_rules('telepon_penerima', 'Nomer Penerima', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan col">Ada kesalahan dalam pengeditan alamat!</div>');
      redirect('profile');
    } else {
      $data = [
        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        'penerima' => htmlspecialchars($this->input->post('penerima', true)),
        'telepon_penerima' => htmlspecialchars($this->input->post('telepon_penerima', true)),
      ];
      $this->db->where('id_alamat', $id);
      $this->db->update('alamat', $data);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan col">alamat berhasil diubah!</div>');
      redirect('profile');
    }
  }

  public function hapusAlamat($id)
  {
    $this->db->delete('alamat', ['id_alamat' => $id]);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan col">alamat berhasil dihapus!</div>');
    redirect('profile');
  }
}
