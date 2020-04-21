<?php
session_start();
include_once 'koneksi.php';
include_once 'models/Login.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = [
    $username,
    $password
];
//create object
$model = new Login();
$rs = $model->otentikasi($data);

if (!empty($rs)) {
    $_SESSION['MEMBER'] = $rs;
    header('location:index.php?hal=pegawai');
} else {
    echo '<script> 
            alert("Gagal Login");
            history.go(-1); 
        </script>';
}
