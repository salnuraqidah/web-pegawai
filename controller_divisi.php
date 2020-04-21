<?php
include_once 'koneksi.php';
include_once 'models/Divisi.php';

//1. get request form
$nama = $_POST['nama'];
//2. save to array data
$data = [$nama]; //tanda tanya pertama
//3. excecution button
$tombol = $_POST['proses'];
//create object
$model = new Divisi();

switch ($tombol) {
    case 'simpan': $model->input($data); break;
    case 'ubah': 
        $data[] = $_POST['idx']; // tangkap hidden field tanda tanya kedua di model
        $model->ubah($data); break;
    case 'hapus':
        unset($data); //hapus ? di atas
        $id = [$_POST['idx']]; //tangkap hidden field di form u/ where id = ?
        $model->hapus($id); break;
    default: header('location:index.php?hal=divisi'); //untuk tombol batal tanpa perubahan data
}
//4. landing page
header('location:index.php?hal=divisi');