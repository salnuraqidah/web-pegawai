<?php
if (isset($_SESSION['MEMBER'])) {

  $ar_judul = [
    'No', 'NIP', 'Nama', 'Gender',
    'Jabatan', 'Divisi', 'Alamat', 'Foto', 'Action'
  ];
?>
  <h3>Data Pegawai</h3>
  <a href="index.php?hal=form_pegawai" type="button" class="btn btn-primary">Input Data</a>
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
      $model = new Pegawai();
      //fitur searching
      $nama = $_GET['nama'];
      $id = $_GET['id'];
      $idx = $_GET['idx'];
      if (!empty($nama)) {
        $rs = $model->cariPegawai($nama);
      } else if (!empty($id)) {
        $rs = $model->filterDivisi($id);
      } else if (!empty($idx)) {
        $rs = $model->filterJabatan($idx);
      } else {
        $rs = $model->dataPegawai();
      }

      $no = 1;
      foreach ($rs as $peg) {
      ?>
        <tr>
          <th scope="row"><?= $no ?></th>
          <td><?= $peg['nip'] ?></td>
          <td><?= $peg['nama'] ?></td>
          <td><?= $peg['gender'] ?></td>
          <td><?= $peg['jabatan'] ?></td>
          <td><?= $peg['divisi'] ?></td>
          <td><?= $peg['alamat'] ?></td>
          <td>
            <?php
            if (empty($peg['foto'])) {
            ?>
              <img src="images/no_photo.png" width="20%" />
            <?php } else {
            ?>
              <img src="images/<?= $peg['foto'] ?>" width="20%" />
            <?php } ?>
          </td>
          <td>
            <a href="index.php?hal=detail_pegawai&id=<?= $peg['id'] ?>" type="button" class="btn btn-primary">Detail</a>
          </td>
          <td>
            <a href="index.php?hal=form_pegawai&idedit=<?= $peg['id'] ?>" type="button" class="btn btn-warning">Edit</a>
          </td>
        </tr>
      <?php $no++;
      } ?>
    </tbody>
  </table>
<?php } else {
  include_once 'denied.php';
}
?>