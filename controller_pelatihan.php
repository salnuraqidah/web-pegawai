<?php
include_once 'koneksi.php';
include_once 'models/Pelatihan.php';

//1. get request element form
$peg = $_POST['pegawai'];
$mat = $_POST['materi'];
$tgl_m = $_POST['tgl_mulai'];
$tgl_a = $_POST['tgl_akhir'];
$ket = $_POST['ket'];


//2. save to array
$data = [
    $peg, // ? 1
    $mat, // ? 2
    $tgl_m, // ? 3
    $tgl_a, // ? 4
    $ket // ? 5
];

//3. excute button
$tombol = $_POST['proses'];

//4. create object
$model = new Pelatihan();

if ($tombol == 'simpan') { //simpan adalah value dari button submit
    $model->simpan($data);
} else if ($tombol == 'ubah') {
    $data[] = $_POST['idx']; //tangkap hidden field dari form u/ ? 11 klausa where id
    $model->ubah($data);
} else if ($tombol == 'hapus') {
    unset($data); //hapus ? di atas
    $id = [$_POST['idx']];
    $model->hapus($id);
} else { //tombol batal tidak ada perubahan data baru
    header('Location:index.php?hal=pelatihan');
}

//4. selesai proses redirect / landing page (ada perubahan data)
header('Location:index.php?hal=pelatihan');
