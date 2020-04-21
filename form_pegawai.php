<?php
if (isset($_SESSION['MEMBER'])) {
  //---awal proses edit data---
  //1. tangkap request idedit 
  $idedit = $_REQUEST['idedit'];
  $model = new Pegawai();
  if (!empty($idedit)) { //modus edit data lama
    $rs = $model->detailPegawai([$idedit]);
  } else { //modus entry data baru
    $rs = [];
  }


  //---akhir proses edit data---

  //master data di radio button dan select option
  $ar_gender = ['Laki-Laki' => 'L', 'Perempuan' => 'P']; //array scalar
  $obj1 = new Jabatan();
  $obj2 = new Divisi();
  $ar_jabatan = $obj1->dataJabatan(); //array asosiatif
  $ar_divisi = $obj2->dataDivisi();
?>

  <h3>Form Pegawai</h3>
  <form method="POST" action="controller_pegawai.php">
    <div class="form-group row">
      <label for="nip" class="col-4 col-form-label">NIP</label>
      <div class="col-8">
        <input id="nip" name="nip" type="text" value="<?= $rs['nip'] ?>" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="nama" class="col-4 col-form-label">Nama</label>
      <div class="col-8">
        <input id="nama" name="nama" value="<?= $rs['nama'] ?>" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-4">Gender</label>
      <div class="col-8">
        <?php
        foreach ($ar_gender as $label => $jk) {
          //tampilkan data lama
          $cek = ($jk == $rs['gender']) ? 'checked' : '';

        ?>
          <div class="form-check form-check-inline">
            <input name="gender" type="radio" <?= $cek ?> class="form-check-input" value="<?= $jk ?>">
            <label class="form-check-label"><?= $label ?></label>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="tmp" class="col-4 col-form-label">Tempat Lahir</label>
      <div class="col-8">
        <input id="tmp" name="tmp" value="<?= $rs['tempat_lahir'] ?>" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="tgl" class="col-4 col-form-label">Tanggal Lahir</label>
      <div class="col-8">
        <input id="tgl" name="tgl" value="<?= $rs['tanggal_lahir'] ?>" type="date" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="jabatan" class="col-4 col-form-label">Jabatan</label>
      <div class="col-8">
        <select id="jabatan" name="jabatan" class="custom-select">
          <option value="">-- Pilih Jabatan --</option>
          <?php
          foreach ($ar_jabatan as $jab) {
            $sel = ($jab['id'] == $rs['idjabatan']) ? 'selected' : '';
          ?>
            <option value="<?= $jab['id'] ?>" <?= $sel ?>><?= $jab['nama'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="divisi" class="col-4 col-form-label">Divisi</label>
      <div class="col-8">
        <select id="divisi" name="divisi" class="custom-select">
          <option value="">-- Pilih Divisi --</option>
          <?php
          foreach ($ar_divisi as $div) {
            $sel = ($div['id'] == $rs['iddivisi']) ? 'selected' : '';
          ?>
            <option value="<?= $div['id'] ?>" <?= $sel ?>><?= $div['nama'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="alamat" class="col-4 col-form-label">Alamat</label>
      <div class="col-8">
        <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control"><?= $rs['alamat'] ?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-4 col-form-label">Email</label>
      <div class="col-8">
        <input id="email" name="email" value="<?= $rs['email'] ?>" type="text" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="foto" class="col-4 col-form-label">Foto</label>
      <div class="col-8">
        <input id="foto" name="foto" type="text" value="<?= $rs['foto'] ?>" class="form-control">
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