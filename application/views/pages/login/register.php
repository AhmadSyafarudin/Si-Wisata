<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
	<link href="<?= base_url() ?>assets/css/login-style.css" rel="stylesheet">
	<link rel="icon" href="<?= base_url() ?>assets/img/icon.png" type="image/x-icon">

	<title>Portal Registrasi SiWisata</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="_lk_de">
					<div class="form-03-main">
						<form action="" id="form-register" method="POST">
							<div class="text-center">
								<h1 class="display-5 text-secondary m-0"><img src="<?= base_url() ?>assets/img/icon.png" class="img-fluid" alt=""> <span class="text-primary">Si</span>Wisata</h1>
							</div>
							<div class="form-group">
								<input type="text" name="nama_lengkap" class="form-control _ge_de_ol" placeholder="Nama Lengkap" required>
							</div>

							<div class="form-group">
								<input type="text" name="username" class="form-control _ge_de_ol" placeholder="Username" required>
							</div>

							<div class="form-group">
								<input type="number" name="no_hp" class="form-control _ge_de_ol" placeholder="Nomor Handphone" required>
							</div>

							<div class="form-group">
								<input type="email" name="email" class="form-control _ge_de_ol" placeholder="Email" required>
							</div>

							<div class="form-group">
								<input type="password" name="password" class="form-control _ge_de_ol" placeholder="Password" required>
							</div>

							<div class="form-group bg-secondary rounded mb-2 p-4">
								<p class="text-center text-white">Berapa Hasil dari Penjumlahan Berikut?</p>
								<h4 class="text-center text-white"><?= $this->session->userdata('numb1') ?> + <?= $this->session->userdata('numb2') ?></h4>
								<input type="number" name="captcha" class="form-control" placeholder="Hasil Penjumlahan" required>
							</div>

							<button class="btn btn-success text-center w-100 rounded-pill mb-2" type="submit"><i class="fas fa-user"></i> Daftar</button>

							<div class="row mt-4">
								<div class="col-md-6">
									<a href="<?= base_url() ?>login" class="btn btn-primary text-center d-block rounded mb-2 " href="#"><i class="fas fa-sign-in-alt"></i> Login</a>
								</div>
								<div class="col-md-6">
									<a href="<?= base_url() ?>" class="btn btn-secondary text-center d-block rounded mb-1" href="#"><i class="fas fa-home"></i> Beranda</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php include('script_register.php') ?>

</html>