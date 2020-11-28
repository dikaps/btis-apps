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
        'is_active' => 0
      ];

      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $this->input->post('email', true),
        'token' => $token,
        'tanggal_dibuat' => time()
      ];

      $this->db->insert('user', $data);
      $this->db->insert('token', $user_token);

      $this->_sendEmail($token, 'verifikasi');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Yeay!! berhasil mendaftarkan akun, silahkan aktifasi akun anda.</div>');
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'btisofficial@gmail.com',
      'smtp_pass' => 'btis1234',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];

    $this->load->library('email', $config);

    $this->email->from('btisofficial@gmail.com', 'BTIS OFFICIAL');
    $this->email->to($this->input->post('email'));

    if ($type == 'verifikasi') {
      $this->email->subject('Verifikasi Akun');
      $this->email->message('Klik link ini untuk verifikasi akun anda : <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a>');
    } elseif ($type == 'lupaPassword') {
      $this->email->subject('Verifikasi Akun');
      $this->email->message('Klik link ini untuk verifikasi / ubah password akun anda : <a href="' . base_url() . 'auth/ubahPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Verifikasi</a>');
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verifikasi()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('token', ['email' => $email])->result_array();

    if ($user) {
      $user_token = $this->db->get_where('token', ['token' => $token])->row_array();
      if ($user_token) {
        if (time() - $user_token['tanggal_dibuat'] < (60 * 60 * 24)) {
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('token', ['email' => $email]);
          $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">Aktifasi akun berhasil.</div>');
          redirect('auth');
        } else {
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('token', ['email' => $email]);

          $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">Aktifasi akun gagal. Token kadaluarsa</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">Aktifasi akun gagal. Token tidak valid</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">Aktifasi akun gagal. Email tidak valid.</div>');
      redirect('auth');
    }
  }

  public function lupaPassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['judul'] = "Lupa Password!";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/lupa-password');
      $this->load->view('templates/auth_footer');
    } else {
      $user = $this->db->get_where('user', ['email' => $this->input->post('email')])->row_array();
      if ($user) {
        $token = base64_encode(random_bytes(32));
        $data = [
          'email' => $this->input->post('email', true),
          'token' => $token,
          'tanggal_dibuat' => time()
        ];

        $this->db->insert('token', $data);
        $this->_sendEmail($token, 'lupaPassword');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">Permintaan untuk ubah password sedang dikirim, silahkan cek email anda.</div>');
        redirect('auth');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">User dengan email ' . $this->input->post('email') . ' Tidak ditemukan.</div>');
        redirect('auth');
      }
    }
  }

  public function ubahPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $token = $this->db->get_where('token', ['token' => $token])->row_array();

      if ($token) {
        if (time() - $token['tanggal_dibuat'] < (60 * 60 * 24)) {
          // $this->db->delete('token', ['email' => $email]);
          $this->session->set_userdata('reset_email', $email);

          $this->updatePassword();

          // redirect('auth/updatePassword?email=' . $email);
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">Ubah Password gagal. Token Kadaluarsa.</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">Ubah Password gagal. Token Tidak Valid.</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">Ubah Password gagal. Email Tidak Valid.</div>');
      redirect('auth');
    }
  }

  public function updatePassword()
  {
    $data['judul'] = "Lupa Password!";
    $email = $this->session->userdata('reset_email');

    if ($this->session->userdata('reset_email')) {
      $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|matches[new_password2]');
      $this->form_validation->set_rules('new_password2', 'Repeat New Password', 'required|trim|matches[new_password1]');
      if ($this->form_validation->run() == false) {
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/ubah-password', $data);
        $this->load->view('templates/auth_footer');
      } else {
        $this->db->set('password', password_hash($this->input->post('new_password1', true), PASSWORD_DEFAULT));
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->db->delete('token', ['email' => $email]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan" role="alert">Ubah Password Berhasil. Silahkan Login.</div>');
        $this->session->unset_userdata('reset_email');
        redirect('auth');
      }
    } else {
      redirect('block/forbidden');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    redirect('auth');
  }
}
