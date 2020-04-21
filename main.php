<div class="row">
		<div class="col-md-9">
			<?php
			//tangkap request dari url/menu
			$hal = $_GET['hal'];
			//jika ada request
			//maka diarahkan ke halaman yg diminta
			if(!empty($hal)){
				include_once $hal.'.php';
			}
			else{
				include_once 'home.php';
			}
			?>
		</div>