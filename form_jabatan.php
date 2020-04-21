<?php
if (isset($_SESSION['MEMBER'])) {
  //1. tangkap request di url (idedit)
  $idedit = $_GET['idedit'];
  //2. simpan ke sebuah data array
  //$id = [$idedit];
  if (!empty($idedit)) { //---modus edit data lama----
    $model = new Jabatan();
    //$rs = $model->getDivisi($id);
    $rs = $model->getJabatan([$idedit]);
  } else { //---modus entry data baru----
    $rs = [];
  }
?>
  <h3>Form Jabatan</h3>
  <form method="POST" action="controller_jabatan.php">
    <div class="form-group row">
      <label for="nama" class="col-4 col-form-label">Nama Jabatan</label>
      <div class="col-8">
        <input id="nama" name="nama" value="<?= $rs['nama'] ?>" type="text" class="form-control">
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