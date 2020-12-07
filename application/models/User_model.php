<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function cekData($field, $where)
  {
    return $this->db->get_where('user', [$field => $where])->row_array();
  }

  public function updateProfile($old_image, $email, $file)
  {
    $data = [
      'username' => htmlspecialchars($this->input->post('nama', true)),
      'nomer_telp' => htmlspecialchars($this->input->post('phone', true)),
      'tanggal_lahir' => htmlspecialchars($this->input->post('ttl', true)),
      'foto_profil' => $this->_upload($old_image)
    ];

    $this->db->where('email', $email);
    $this->db->update('user', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan col-12" role="alert">Profile berhasil dirubah!!</div>');
    redirect('profile');
  }

  private function _upload($old_image)
  {

    $image = $_FILES['foto']['name'];
    if (!$image) {
      return $old_image;
    }

    $type = explode(".", $image);
    $type = strtolower(end($type));
    $image_valid = ['jpg', 'jpeg', 'png'];

    if (!in_array($type, $image_valid)) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan">File yang di upload harus jpg / png / jpeg!!</div>');
      redirect('profile');
    }

    if ($image) {
      $config['upload_path']          = './assets/img/profile';
      $config['allowed_types']        = 'jpeg|jpg|png';
      $config['max_size']             = 3000;
      $config['file_name']            = 'user' . time();

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('foto')) {
        if ($old_image != 'default.jpg') {
          unlink(FCPATH . 'assets/img/profile/' . $old_image);
          return $this->upload->data('file_name');
        } else {
          return $this->upload->data('file_name');
        }
      } else {
        $this->upload->display_errors();
      }
    }
  }

  // kontak 

}
