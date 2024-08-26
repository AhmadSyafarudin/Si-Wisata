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

	<title>Portal Login SiWisata</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="_lk_de">
					<div class="form-03-main">
						<div class="text-center">
							<h1 class="display-5 text-secondary m-0"><img src="<?= base_url() ?>assets/img/icon.png" class="img-fluid" alt=""> <span class="text-primary">Si</span>Wisata</h1>
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
						</div>

						<div class="form-group">
							<input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" required="" aria-required="true">
						</div>

						<div class="checkbox form-group">
							<a href="#" class="text-primary">Forgot Password</a>
						</div>

						<a href="#" class="btn btn-primary text-center d-block rounded-pill mb-2" href="#"><i class="fas fa-sign-in-alt"></i> Login</a>
						<div class="row mt-4">
							<div class="col-md-6">
								<a href="#" class="btn btn-success text-center d-block rounded mb-2 " href="#"><i class="fas fa-user"></i> Daftar</a>
							</div>
							<div class="col-md-6">
								<a href="<?= base_url() ?>" class="btn btn-secondary text-center d-block rounded mb-1" href="#"><i class="fas fa-home"></i> Beranda</a>
							</div>
						</div>

						<div class="form-group pt-0">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>