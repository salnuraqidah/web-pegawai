<?php
include_once 'koneksi.php';
include_once 'models/Login.php';

//1. get request form
$fname = $_POST['fname'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$role = $_POST['role'];
$email = $_POST['email'];
$foto = $_POST['foto'];

//2. save to array data
$data = [$fname, $uname, $pwd, $role, $email, $foto]; //tanda tanya pertama
//3. excecution button
$tombol = $_POST['proses'];
//create object
$model = new Login();

switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;
    case 'ubah':
        $data[] = $_POST['idx']; // tangkap hidden field tanda tanya kedua di model
        $model->ubah($data);
        break;
    case 'hapus':
        unset($data); //hapus ? di atas
        $id = [$_POST['idx']]; //tangkap hidden field di form u/ where id = ?
        $model->hapus($id);
        break;
    default:
        header('location:index.php?hal=kelolaUser'); //untuk tombol batal tanpa perubahan data
}
//4. landing page
header('location:index.php?hal=kelolaUser');
