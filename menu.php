<div class="row">
	<div class="col-md-12">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="navbar-toggler-icon"></span>
			</button> <a class="navbar-brand" href="#">Tech Muda 4</a>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="index.php?hal=home"> <i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?hal=aboutus"> <i class="fas fa-address-book"></i> About Us</a>
					</li>
					<?php
					if (isset($_SESSION['MEMBER'])) {
					?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Master Data</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="index.php?hal=pegawai">Pegawai</a>
								<a class="dropdown-item" href="index.php?hal=divisi">Divisi</a>
								<a class="dropdown-item" href="index.php?hal=jabatan">Jabatan</a>
								<?php
								if ($_SESSION['MEMBER']['role'] != 'staff') {
								?>
									<div class="dropdown-divider">
									</div> <a class="dropdown-item" href="index.php?hal=gaji">Gaji</a>
								<?php } ?>
							</div>
						</li>
						<?php if ($_SESSION['MEMBER']['role'] != 'staff') {
						?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Pelatihan</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="index.php?hal=pelatihan">Pelatihan</a>
									<a class="dropdown-item" href="index.php?hal=materi">Materi</a>
								</div>
							</li>
					<?php }
					} ?>

				</ul>
				<?php
				if (isset($_SESSION['MEMBER'])) { //belum atau gagal login
				?>
					<form class="form-inline">
						<input name="nama" class="form-control mr-sm-2" type="text">
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Search
						</button>
						<input type="hidden" name="hal" value="pegawai" />
					</form>
				<?php } ?>
				<ul class="navbar-nav ml-md-auto">
					<?php
					if (!isset($_SESSION['MEMBER'])) { //belum atau gagal login
					?>
						<li class="nav-item active">
							<a class="nav-link" href="index.php?hal=form_login">Login</a>
						</li>
					<?php } else { //sukses login

					?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
								Hello, <?= $_SESSION['MEMBER']['fullname'] ?>
								<img src="images/<?= $_SESSION['MEMBER']['foto'] ?>" width="10%" /> </a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="index.php?hal=profile&id=<?= $_SESSION['MEMBER']['id'] ?>">Profile</a>
								<?php
								if ($_SESSION['MEMBER']['role'] == 'administrator') {
								?>
									<a class="dropdown-item" href="index.php?hal=kelolaUser">Kelola User</a>
								<?php } ?>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</nav>
	</div>
</div>