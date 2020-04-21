<?php
if (isset($_SESSION['MEMBER'])) {
  $ar_judul = ['No', 'Nama Jabatan', 'Action'];
?>
  <a href="index.php?hal=form_jabatan" type="button" class="btn btn-primary">Input Data</a>
  <br />
  <h3>Data Jabatan</h3>
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
      $model = new Jabatan();
      $rs = $model->dataJabatan();
      $no = 1;
      foreach ($rs as $jab) {
      ?>
        <tr>
          <th scope="row"><?= $no ?></th>
          <td><?= $jab['nama'] ?></td>
          <td>
            <a href="index.php?hal=form_jabatan&idedit=<?= $jab['id'] ?>" type="button" class="btn btn-warning">Edit</a>
          </td>
        </tr>
      <?php $no++;
      } ?>
    </tbody>
  </table>
<?php } else {
  include_once 'denied.php';
} ?>