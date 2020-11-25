<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favorit_model extends CI_Model
{
  private $table = 'favorit';

  public function getFav($idUser)
  {
    $this->db->select('*');
    $this->db->from('favorit');
    $this->db->join('produk', 'produk.id_produk = favorit.id_produk');
    $this->db->where('id_user', $idUser);
    return $query = $this->db->get()->result_array();
  }

  public function getJoinDiskon()
  {
    $this->db->select('*');
    $this->db->from('favorit');
    $this->db->join('diskon', 'diskon.id_produk = favorit.id_produk');
    return $query = $this->db->get()->result_array();
  }
}
