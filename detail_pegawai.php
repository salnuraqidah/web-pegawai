<?php
//tangkap request id di url
$id = $_GET['id'];
$model = new Pegawai();
$peg = $model->detailPegawai([$id]);

?>

<div class="card" style="width: 20rem;">
<?php
          if (empty($peg['foto'])) {
          ?>
            <img src="images/no_photo.png" class="card-img-top" alt="..." />
          <?php } else {
          ?>
            <img src="images/<?= $peg['foto'] ?>" class="card-img-top" alt="...">
          <?php } ?> 
    
  <div class="card-body">
    <h5 class="card-title"><?= $peg['nama'] ?></h5>
    <p class="card-text">
        NIP : <?= $peg['nip'] ?> <br/>
        Nama : <?= $peg['nama'] ?> <br/>
        Jenis Kelamin : <?= $peg['gender'] ?> <br/>
        Divisi : <?= $peg['divisi'] ?> <br/>
        Jabatan : <?= $peg['jabatan'] ?> <br/>
        Tempat Lahir : <?= $peg['tempat_lahir'] ?> <br/>
        Tanggal Lahir : <?= $peg['tanggal_lahir'] ?> <br/>
        Alamat : <?= $peg['alamat'] ?> <br/>
        Email : <?= $peg['email'] ?> <br/>
    </p>
    <a href="index.php?hal=pegawai" class="btn btn-primary">Go back</a>
  </div>
</div>
