<?php
//tangkap request id di url
$id = $_GET['id'];
$model = new Gaji();
$gaji = $model->getGaji([$id]);
?>

<div class="card" style="width: 20rem;">
  <?php
  if (empty($gaji['foto'])) {
  ?>
    <img src="images/no_photo.png" class="card-img-top" alt="..." />
  <?php } else {
  ?>
    <img src="images/<?= $gaji['foto'] ?>" class="card-img-top" alt="...">
  <?php } ?>
  <div class="card-body">
    <h5 class="card-title"><?= $gaji['nama'] ?></h5>
    <p class="card-text">
      <?php
      $ar_judul = [
        'NIP' => $gaji['nip'], 'Divisi' => $gaji['divisi'], 'Jabatan' => $gaji['jabatan'],
        'Gaji Pokok' => $gaji['gapok'], 'Tunjangan Jabatan' => $gaji['tunjab'],
        'BPJS' => $gaji['bpjs'], 'Lain-Lain' => $gaji['lain2']
      ];
      ?>
      <table cellpadding="5">
        <?php
        foreach ($ar_judul as $k => $v) {
        ?>
          <tr>
            <td><?= $k ?></td>
            <td><?= $v ?></td>
          </tr>
        <?php } ?>
      </table>
    </p>
    <a href="index.php?hal=gaji" class="btn btn-primary">Go back</a>
  </div>
</div>