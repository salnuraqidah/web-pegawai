<?php
if (isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff') {
  $idedit = $_REQUEST['idedit'];
  $model = new Gaji();
  if (!empty($idedit)) {
    $rs = $model->getGaji([$idedit]);
  } else {
    $rs = [];
  }

  $obj2 = new Gaji();
  $pegawai2 = $obj2->dataBelumDigaji();
  $obj = new Pegawai();
  $pegawai = $obj->dataPegawai();
?>
  <form method="POST" action="controller_gaji.php">
    <div class="form-group row">
      <label for="nama" class="col-4 col-form-label">Nama Pegawai</label>
      <div class="col-8">
        <?php
        $dis = ($pegawai['id'] == $rs['pegawai_id']) ? '' : 'disabled';
        ?>
        <select id="nama" name="nama" class="custom-select" <?= $dis ?>>
          <option value="">-- Nama Pegawai --</option>
          <?php
          foreach ($pegawai as $peg) {
            if ($peg['id'] == $rs['pegawai_id']) {
          ?>
              <option value="<?= $peg['id'] ?>" selected><?= $peg['nama'] ?></option>
            <?php }
          }
          foreach ($pegawai2 as $peg2) {
            ?>
            <option value="<?= $peg2['idp'] ?>"><?= $peg2['nama'] ?></option>
          <?php }
          ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="gapok" class="col-4 col-form-label">Gaji Pokok</label>
      <div class="col-8">
        <input id="gapok" value="<?= $rs['gapok'] ?>" name="gapok" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="tunjab" class="col-4 col-form-label">Tunjangan Jabatan</label>
      <div class="col-8">
        <input id="tunjab" name="tunjab" value="<?= $rs['tunjab'] ?>" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="bpjs" class="col-4 col-form-label">BPJS</label>
      <div class="col-8">
        <input id="bpjs" name="bpjs" value="<?= $rs['bpjs'] ?>" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="lain2" class="col-4 col-form-label">Lain-Lain</label>
      <div class="col-8">
        <input id="lain2" name="lain2" value="<?= $rs['lain2'] ?>" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-4 col-8">
        <?php
        if (empty($idedit)) { //--------modus entry data baru--------
        ?>
          <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
        <?php
        } else { //--------modus edit data lama--------
        ?>
          <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
          <button name="proses" value="hapus" type="submit" onClick="return confirm('are you sure?')" class="btn btn-danger">Hapus</button>
          <!-- hidden field untuk melempar idedit ke controller -->
          <input type="hidden" name="idx" value="<?= $idedit ?>" />
        <?php } ?>
        <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
      </div>
    </div>
  </form>
<?php } else {
  include_once 'denied.php';
} ?>