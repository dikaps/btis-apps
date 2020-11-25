<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('checked')) {

  function checked($data, $ukuran)
  {
    if (in_array($ukuran, $data)) {
      return "checked";
    }
  }
}

if (!function_exists('hargaDiskon')) {
  function hargaDiskon($harga, $diskon)
  {
    $diskon = $harga * $diskon / 100;
    return $harga = $harga - $diskon;
  }
}

if (!function_exists('cek_login')) {
  function cek_login()
  {
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
      redirect('auth');
    }
  }
}

if (!function_exists('cek_admin')) {
  function cek_admin()
  {
    $ci = get_instance();

    if ($ci->session->userdata('role_id') == 2) {
      redirect('block/forbidden');
    }
  }
}
