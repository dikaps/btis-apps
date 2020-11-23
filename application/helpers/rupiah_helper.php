<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('rupiah')) {
  function rupiah($angka)
  {
    // ,',','.')
    return number_format($angka, 0, ',', '.');
  }
}
