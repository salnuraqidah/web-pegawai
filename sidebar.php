<?php

$obj1 = new Divisi;
$obj2 = new Jabatan;
$ar_divisi = $obj1->dataDivisi();
$ar_jabatan = $obj2->dataJabatan();
?>
<div class="col-md-3">
	<?php if (isset($_SESSION['MEMBER'])) { ?>
		<div class="list-group">
			<a href="#" class="list-group-item list-group-item-action active">Divisi</a>
			<?php
			foreach ($ar_divisi as $div) {
			?>
				<div class="list-group-item">
					<a href="index.php?hal=pegawai&id=<?= $div['id'] ?>"> <?= $div['nama'] ?> </a>
				</div>
			<?php } ?>
		</div>
		<br><br>
		<div class="list-group">
			<a href="#" class="list-group-item list-group-item-action active">Jabatan</a>
			<?php
			foreach ($ar_jabatan as $jab) {
			?>
				<div class="list-group-item">
					<a href="index.php?hal=pegawai&idx=<?= $jab['id'] ?>"> <?= $jab['nama'] ?> </a>
				</div>
			<?php } ?>
		</div>
	<?php } else {
	?>
		<?php include_once 'form_login.php'; ?>
	<?php } ?>
</div>
</div>