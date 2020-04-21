<?php
include_once 'koneksi.php';
include_once 'models/Jabatan.php';

//1. get request form
$nama = $_POST['nama'];
//2. save to array data
$data = [$nama];
//3. excecution button
$tombol = $_POST['proses'];
//create object
$model = new Jabatan();

switch ($tombol) {
    case 'simpan': $model->input($data); break;
    case 'ubah': 
        $data[] = $_POST['idx']; // tangkap hidden field tanda tanya kedua di model
        $model->ubah($data); break;
    case 'hapus':
        unset($data);
        $id = [$_POST['idx']];
        $model->hapus($id); break;    
    default: header('location:index.php?hal=jabatan');
}
//4. landing page
header('location:index.php?hal=jabatan');