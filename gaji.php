<?php
if (isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff') {

  $ar_judul = [
    'No', 'Nama', 'Jabatan', 'Divisi', 'Gaji Pokok', 'Action'
  ];
?>
  <h3>Data Gaji</h3><br />
  <a href="index.php?hal=form_gaji" type="button" class="btn btn-primary">Input Data</a>
  <br />
  <table class="table table-sm table-dark">
    <thead>
      <tr>
        <?php
        foreach ($ar_judul as $jdl) {
        ?>
          <th scope="col"><?= $jdl ?></th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php
      //ciptakan object
      $model = new Gaji();
      $rs = $model->dataGaji();
      $no = 1;
      foreach ($rs as $gaji) {
      ?>
        <tr>
          <th scope="row"><?= $no ?></th>
          <td><?= $gaji['nama'] ?></td>
          <td><?= $gaji['jabatan'] ?></td>
          <td><?= $gaji['divisi'] ?></td>
          <td><?= $gaji['gapok'] ?></td>
          <td>
            <a href="index.php?hal=detail_gaji&id=<?= $gaji['id'] ?>" type="button" class="btn btn-primary">Detail</a>
            <a href="index.php?hal=form_gaji&idedit=<?= $gaji['id'] ?>" type="button" class="btn btn-info">Edit</a>
          </td>
        </tr>
      <?php $no++;
      } ?>
    </tbody>
  </table>
<?php } else {
  include_once 'denied.php';
} ?>