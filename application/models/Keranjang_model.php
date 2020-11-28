<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
  public function getKeranjangJoin($idUser)
  {
    $this->db->select('produk.nama_produk, produk.foto_produk, produk.harga, keranjang.*');
    $this->db->from('keranjang');
    $this->db->where('id_user', $idUser);
    $this->db->join('produk', 'produk.id_produk = keranjang.id_produk');
    return $this->db->get()->result_array();
  }

  public function getProdukJoin($id)
  {
    $this->db->select('produk.nama_produk, produk.harga, produk.foto_produk, produk.id_produk, keranjang.*');
    $this->db->from('keranjang');
    $this->db->join('produk', 'produk.id_produk = keranjang.id_produk');
    $this->db->where('id_keranjang', $id);
    return $this->db->get()->row_array();
  }

  public function getPesananBelum($user)
  {
    $this->db->select('alamat.alamat, alamat.penerima, alamat.telepon_penerima, produk.foto_produk, produk.id_produk, pesanan.*');
    $this->db->from('pesanan');
    $this->db->join('keranjang', 'keranjang.id_keranjang = pesanan.id_keranjang');
    $this->db->join('produk', 'produk.id_produk = keranjang.id_produk');
    $this->db->join('alamat', 'alamat.id_alamat = pesanan.id_alamat');
    $this->db->where('pesanan.status_pemesanan', 0, 'pesanan.id_user', $user);
    return $this->db->get()->result_array();
  }

  public function getPesananSelesai($user)
  {
    $this->db->select('alamat.alamat, alamat.penerima, alamat.telepon_penerima, produk.foto_produk, produk.nama_produk, keranjang.ukuran, keranjang.jml_beli, pesanan.*');
    $this->db->from('pesanan');
    $this->db->join('keranjang', 'keranjang.id_keranjang = pesanan.id_keranjang');
    $this->db->join('produk', 'produk.id_produk = keranjang.id_produk');
    $this->db->join('alamat', 'alamat.id_alamat = pesanan.id_alamat');
    $this->db->where('pesanan.status_pemesanan', 1, 'pesanan.id_user', $user);
    return $this->db->get()->result_array();
  }
}
