<?php
if (isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff') {
    $idedit = $_GET['idedit'];
    if (!empty($idedit)) { //---modus edit data lama----
        $model = new Materi();
        //$rs = $model->getDivisi($id);
        $rs = $model->getMateri([$idedit]);
    } else { //---modus entry data baru----
        $rs = [];
    }
?>
    <h3>Form Materi</h3>
    <form method="POST" action="controller_materi.php">
        <div class="form-group row">
            <label class="col-4 col-form-label" for="nama">Materi Pelatiahan</label>
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