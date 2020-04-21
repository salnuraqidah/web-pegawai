<?php
//1. tangkap request di url (idedit)
$idedit = $_GET['idedit'];
//2. simpan ke sebuah data array
//$id = [$idedit];
if (!empty($idedit)) { //---modus edit data lama----
    $model = new Login();
    //$rs = $model->getDivisi($id);
    $rs = $model->getUser([$idedit]);
} else { //---modus entry data baru----
    $rs = [];
}
$ar_role = [
    'Administrator' => 'administrator',
    'Manager' => 'manager',
    'Staff' => 'staff'
];
$obj = new Login();
$user = $obj->dataUser();

$dis = ($user['id'] == $rs['id']) ? '' : 'readonly';
?>
<h3>Add User</h3>
<form method="POST" action="controller_user.php">
    <div class="form-group row">
        <label class="col-4 col-form-label" for="nama">Fullname</label>
        <div class="col-8">
            <input id="nama" name="fname" value="<?= $rs['fullname'] ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label" for="nama">Username</label>
        <div class="col-8">
            <input id="nama" name="uname" <?= $dis ?> value="<?= $rs['username'] ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label" for="nama">Password</label>
        <div class="col-8">
            <input id="nama" name="pwd" <?= $dis ?> value="<?= $rs['passwors'] ?>" type="password" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4">Role</label>
        <div class="col-8">
            <?php
            foreach ($ar_role as $label => $role) {
                $cek = ($role == $rs['role']) ? 'checked' : '';
            ?>
                <div class="form-check form-check-inline">
                    <input name="role" type="radio" <?= $cek ?> class="form-check-input" value="<?= $role ?>">
                    <label class="form-check-label"><?= $label ?></label>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label" for="nama">Email</label>
        <div class="col-8">
            <input id="nama" name="email" value="<?= $rs['email'] ?>" type="email" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label" for="nama">Foto</label>
        <div class="col-8">
            <input id="nama" name="foto" value="<?= $rs['foto'] ?>" type="text" class="form-control">
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