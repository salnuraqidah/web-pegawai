<?php
//tangkap request id di url
$id = $_GET['id'];
$model = new Login();
$profil = $model->getUser([$id]);

?>

<div class="card" style="width: 20rem;">
    <?php
    if (empty($profil['foto'])) {
    ?>
        <img src="images/no_photo.png" class="card-img-top" alt="..." />
    <?php } else {
    ?>
        <img src="images/<?= $profil['foto'] ?>" class="card-img-top" width="20%" alt="...">
    <?php } ?>
    <div class="card-body">
        <h5 class="card-title"><?= $profil['fullname'] ?></h5>
        <p class="card-text">
            <?php
            $ar_judul = [
                'Username' => $profil['username'],
                'Role' => $profil['role'], 'Email' => $profil['email']
            ];
            ?>
            <table cellpadding="10">
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
        <a href="index.php?hal=home" class="btn btn-primary">Go back</a>
    </div>
</div>