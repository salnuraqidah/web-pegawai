<?php
include_once 'koneksi.php';
include_once 'models/Gaji.php';

$nama = $_POST['nama'];
$gapok = $_POST['gapok'];
$tunjab = $_POST['tunjab'];
$bpjs = $_POST['bpjs'];
$lain2 = $_POST['lain2'];

$data = [
  $nama, $gapok, $tunjab, $bpjs, $lain2
];
$data2 = [
  $gapok, $tunjab, $bpjs, $lain2
];
$tombol = $_POST['proses'];

$model = new Gaji();

if ($tombol == 'simpan') { //simpan adalah value dari button submit
  $model->simpan($data);
} else if ($tombol == 'ubah') {
  $data2[] = $_POST['idx'];
  $model->ubah($data2);
} else if ($tombol == 'hapus') {
  unset($data); //hapus ? di atas
  $id = [$_POST['idx']];
  $model->hapus($id);
} else { //tombol batal tidak ada perubahan data baru
  header('Location:index.php?hal=gaji');
}
//4. selesai proses redirect / landing page (ada perubahan data)
header('Location:index.php?hal=gaji');
