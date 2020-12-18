<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
  public function getPesananId($id)
  {
    $this->db->select('*');
    $this->db->from('pesanan');
    $this->db->join('produk', 'produk.id_produk = pesanan.id_produk');
    $this->db->join('alamat', 'alamat.id_alamat = pesanan.id_alamat');
    $this->db->join('user', 'user.id_user = pesanan.id_user');
    $this->db->join('bank', 'bank.id_bank = pesanan.id_bank');
    $this->db->where('pesanan.id_pesanan', $id);
    return $this->db->get()->row_array();
  }

  public function getPesananWhere($status, $user)
  {
    $this->db->select('*');
    $this->db->from('pesanan');
    $this->db->join('produk', 'produk.id_produk = pesanan.id_produk');
    $this->db->join('alamat', 'alamat.id_alamat = pesanan.id_alamat');
    $this->db->join('user', 'user.id_user = pesanan.id_user');
    $this->db->where('pesanan.id_user', $user,  'pesanan.status_pemesanan', $status);
    return $this->db->get()->result_array();
  }

  public function getStatusPesananBaru()
  {
    $this->db->select('*');
    $this->db->from('pesanan');
    $this->db->join('produk', 'produk.id_produk = pesanan.id_produk');
    $this->db->join('alamat', 'alamat.id_alamat = pesanan.id_alamat');
    $this->db->join('user', 'user.id_user = pesanan.id_user');
    $this->db->where('pesanan.status_pengiriman', 0);
    return $this->db->get()->result_array();
  }

  public function getStatusPesananDikirim()
  {
    $this->db->select('*');
    $this->db->from('pesanan');
    $this->db->join('produk', 'produk.id_produk = pesanan.id_produk');
    $this->db->join('alamat', 'alamat.id_alamat = pesanan.id_alamat');
    $this->db->join('user', 'user.id_user = pesanan.id_user');
    $this->db->where('pesanan.status_pemesanan', 0, 'pesanan.status_pengiriman', 1);
    return $this->db->get()->result_array();
  }

  public function getStatusPesananSelesai()
  {
    $this->db->select('*');
    $this->db->from('pesanan');
    $this->db->join('produk', 'produk.id_produk = pesanan.id_produk');
    $this->db->join('alamat', 'alamat.id_alamat = pesanan.id_alamat');
    $this->db->join('user', 'user.id_user = pesanan.id_user');
    $this->db->where('pesanan.status_pemesanan', 1, 'pesanan.status_pengiriman', 1);
    return $this->db->get()->result_array();
  }
}
