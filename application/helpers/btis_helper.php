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
