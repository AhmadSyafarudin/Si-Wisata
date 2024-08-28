<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar p-0">
	<nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
		<a href="<?= base_url() ?>" class="navbar-brand p-0">
			<h1 class="display-5 text-secondary m-0"><img src="<?= base_url() ?>assets/img/icon.png" class="img-fluid" alt=""> <span class="text-primary">Si</span>Wisata</h1>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
			<span class="fa fa-bars"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="navbar-nav ms-auto py-0">
				<a href="<?= base_url() ?>" class="nav-item nav-link <?= (isset($link) && $link == 'home') ? 'active' : '' ?>">Beranda</a>
				<a href="#" class="nav-item nav-link">Tentang</a>
				<a href="#" class="nav-item nav-link">Layanan</a>
				<a href="#" class="nav-item nav-link">Kontak</a>
			</div>
			<button class="btn btn-primary btn-md-square border-secondary mb-3 mb-md-3 mb-lg-0 me-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
			<?php if (!$this->session->userdata('user')) : ?>
				<a href="<?= base_url() ?>login" class="btn btn-primary border-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><i class="fas fa-sign-in-alt"></i> Login</a>
			<?php else : ?>
				<div class="profile-menu">
					<div class="nav-item topbar-user dropdown hidden-caret">
						<a
							class="dropdown-toggle profile-pic"
							data-bs-toggle="dropdown"
							href="#"
							aria-expanded="false">
							<div class="avatar-sm">
								<img
									src="<?= base_url() ?>upload/user/default_pic.jpg"
									alt="..."
									class="avatar-img rounded-circle" />
							</div>
							<span class="profile-username">
								<span class="op-7">Hi,</span>
								<span class="fw-bold"><?= explode(" ", $this->session->userdata('user')->nama_lengkap)[0] ?></span>
							</span>
						</a>
						<ul class="dropdown-menu dropdown-user animated fadeIn">
							<div class="dropdown-user-scroll scrollbar-outer">
								<li>
									<div class="user-box">
										<div class="avatar-lg">
											<img
												src="<?= base_url() ?>upload/user/default_pic.jpg"
												alt="image profile"
												class="avatar-img rounded" />
										</div>
										<div class="u-text">
											<h4><?= $this->session->userdata('user')->nama_lengkap ?></h4>
											<p class="text-muted"><?= $this->session->userdata('user')->email ?></p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<?php if ($this->session->userdata('user')->role == 'Admin') : ?>
										<a class="dropdown-item" href="<?= base_url() ?>admin">Daftar Tiket</a>
									<?php else : ?>
										<a class="dropdown-item" href="<?= base_url() ?>tiket">Pesanan Saya</a>
									<?php endif; ?>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= base_url() ?>logout">Logout</a>
								</li>
							</div>
						</ul>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</nav>
</div>
<!-- Navbar & Hero End -->