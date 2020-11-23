<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('beranda');
    }
    $rules = [
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|valid_email'
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|trim'
      ]
    ];

    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run() == false) {
      $data['judul'] = "Login!";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = htmlspecialchars($this->input->post('email', true));
    $password = $this->input->post('password', true);

    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    if ($user) {
      if ($user['is_active'] == 1) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];

          $this->session->set_userdata($data);
          redirect('beranda');
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan">Password salah!!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan">Akun anda belum aktif!!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan">User tidak ditemukan!!</div>');
      redirect('auth');
    }
  }

  public function registrasi()
  {
    $rules = [
      [
        'field' => 'nama',
        'label' => 'Nama Lengkap',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|valid_email|is_unique[user.email]'
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|trim|min_length[3]'
      ]
    ];

    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == false) {
      $data['judul'] = "Registrasi!";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registrasi');
      $this->load->view('templates/auth_footer');
    } else {
      $data = [
        'id_user' => 'user' . rand(0, 9999),
        'username' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1
      ];

      $this->db->insert('user', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Yeay!! berhasil mendaftarkan akun, silahkan login</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    redirect('auth');
  }
}
