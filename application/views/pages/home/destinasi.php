<!-- Services Start -->
<div class="container-fluid service overflow-hidden pt-5">
	<div class="container py-5">
		<div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
			<div class="sub-style">
				<h5 class="sub-title text-primary px-3">Destinasi Wisata</h5>
			</div>
			<h1 class="display-5 mb-4">Temukan Destinasi Pilihan Anda</h1>
			<p class="mb-0">Berbagai Destinasi Wisata Pilihan yang Menarik untuk Anda Kunjungi</p>
		</div>
		<div class="row g-4">
			<div class="col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
				<div class="service-item">
					<div class="service-inner">
						<div class="service-img">
							<img src="<?= base_url() ?>assets/img/destinasi-1.jpg?<?= uniqid() ?>" class="img-fluid w-100 rounded" alt="Image">
						</div>
						<div class="service-title">
							<div class="service-title-name">
								<div class="bg-primary text-center rounded p-3 mx-5 mb-4">
									<a href="#" class="h4 text-white mb-0">Taman Nasional Wakatobi</a>
								</div>
								<a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#">Pesan Sekarang</a>
							</div>
							<div class="service-content pb-4">
								<a href="#">
									<h4 class="text-white mb-4 py-3">Taman Nasional Wakatobi</h4>
								</a>
								<div class="px-4">
									<p class="mb-4">Taman Nasional Wakatobi di Sulawesi Tenggara merupakan salah satu surga wisata Indonesia yang wajib kamu kunjungi sekali seumur hidup.</p>
									<?php if ($this->session->userdata('user')) : ?>
										<button class="btn btn-primary border-secondary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#tiketModal">Pesan Sekarang</button>
									<?php else : ?>
										<a class="btn btn-primary border-secondary rounded-pill py-3 px-5" href="<?= base_url() ?>login">Pesan Sekarang</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
				<div class="service-item">
					<div class="service-inner">
						<div class="service-img">
							<img src="<?= base_url() ?>assets/img/destinasi-2.png?<?= uniqid() ?>" class="img-fluid w-100 rounded" alt="Image">
						</div>
						<div class="service-title">
							<div class="service-title-name">
								<div class="bg-primary text-center rounded p-3 mx-5 mb-4">
									<a href="#" class="h4 text-white mb-0">Tana Toraja</a>
								</div>
								<a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#">Pesan Sekarang</a>
							</div>
							<div class="service-content pb-4">
								<a href="#">
									<h4 class="text-white mb-4 py-3">Tana Toraja</h4>
								</a>
								<div class="px-4">
									<p class="mb-4">Tana Toraja memiliki keindahan alam yang luar biasa mulai dari deretan pegunungan dan hijau perbukitannya. Selain kaya akan alamnya, tempat wisata d Indonesia ini juga kaya akan budaya leluhur yang masih dijaga sampai saat ini.</p>
									<?php if ($this->session->userdata('user')) : ?>
										<button class="btn btn-primary border-secondary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#tiketModal">Pesan Sekarang</button>
									<?php else : ?>
										<a class="btn btn-primary border-secondary rounded-pill py-3 px-5" href="<?= base_url() ?>login">Pesan Sekarang</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.5s">
				<div class="service-item">
					<div class="service-inner">
						<div class="service-img">
							<img src="<?= base_url() ?>assets/img/destinasi-3.jpg?<?= uniqid() ?>" class="img-fluid w-100 rounded" alt="Image">
						</div>
						<div class="service-title">
							<div class="service-title-name">
								<div class="bg-primary text-center rounded p-3 mx-5 mb-4">
									<a href="#" class="h4 text-white mb-0">Candi Borobudur</a>
								</div>
								<a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#">Pesan Sekarang</a>
							</div>
							<div class="service-content pb-4">
								<a href="#">
									<h4 class="text-white mb-4 py-3">Candi Borobudur</h4>
								</a>
								<div class="px-4">
									<p class="mb-4">Candi Borobudur merupakan kompleks candi Buddha terbesar di dunia. Candi yang menjadi salah satu tempat wisata terindah di Indonesia ini ditetapkan UNESCO sebagai salah satu situs warisan dunia pada tahun 1991.</p>
									<?php if ($this->session->userdata('user')) : ?>
										<button class="btn btn-primary border-secondary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#tiketModal">Pesan Sekarang</button>
									<?php else : ?>
										<a class="btn btn-primary border-secondary rounded-pill py-3 px-5" href="<?= base_url() ?>login">Pesan Sekarang</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
				<div class="service-item">
					<div class="service-inner">
						<div class="service-img">
							<img src="<?= base_url() ?>assets/img/destinasi-4.png" class="img-fluid w-100 rounded" alt="Image">
						</div>
						<div class="service-title">
							<div class="service-title-name">
								<div class="bg-primary text-center rounded p-3 mx-5 mb-4">
									<a href="#" class="h4 text-white mb-0">Raja Ampat</a>
								</div>
								<a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#">Pesan Sekarang</a>
							</div>
							<div class="service-content pb-4">
								<a href="#">
									<h4 class="text-white mb-4 py-3">Raja Ampat</h4>
								</a>
								<div class="px-4">
									<p class="mb-4">Raja Ampat menjadi primadona baru di dunia pariwisata Indonesia. Pesona tempat wisata terindah di Indonesia ini mulai banyak dikenal baik oleh wisatawan domestik maupun mancanegara. Raja Ampat sendiri merupakan kumpulan dari pulau-pulau di ujung Papua. Ada empat pulau utama di sini, yaitu Waigeo, Misool, Salawati dan Batanta.</p>
									<?php if ($this->session->userdata('user')) : ?>
										<button class="btn btn-primary border-secondary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#tiketModal">Pesan Sekarang</button>
									<?php else : ?>
										<a class="btn btn-primary border-secondary rounded-pill py-3 px-5" href="<?= base_url() ?>login">Pesan Sekarang</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
				<div class="service-item">
					<div class="service-inner">
						<div class="service-img">
							<img src="<?= base_url() ?>assets/img/destinasi-5.png?<?= uniqid() ?>" class="img-fluid w-100 rounded" alt="Image">
						</div>
						<div class="service-title">
							<div class="service-title-name">
								<div class="bg-primary text-center rounded p-3 mx-5 mb-4">
									<a href="#" class="h4 text-white mb-0">Taman Laut Bunaken</a>
								</div>
								<a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#">Pesan Sekarang</a>
							</div>
							<div class="service-content pb-4">
								<a href="#">
									<h4 class="text-white mb-4 py-3">Taman Laut Bunaken</h4>
								</a>
								<div class="px-4">
									<p class="mb-4">Taman Laut Bunaken menjadi salah satu tempat wisata terindah di Indonesia yang lagi-lagi ditetapkan UNESCO sebagai situs warisan dunia, tepatnya pada tahun 2005. Hal ini dikarenakan kekayaan dan keragaman biota lautnya yang luar biasa mulai dari terumbu karang, rumput laut sampai spesies ikan yang ada.</p>
									<?php if ($this->session->userdata('user')) : ?>
										<button class="btn btn-primary border-secondary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#tiketModal">Pesan Sekarang</button>
									<?php else : ?>
										<a class="btn btn-primary border-secondary rounded-pill py-3 px-5" href="<?= base_url() ?>login">Pesan Sekarang</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.5s">
				<div class="service-item">
					<div class="service-inner">
						<div class="service-img">
							<img src="<?= base_url() ?>assets/img/destinasi-6.png" class="img-fluid w-100 rounded" alt="Image">
						</div>
						<div class="service-title">
							<div class="service-title-name">
								<div class="bg-primary text-center rounded p-3 mx-5 mb-4">
									<a href="#" class="h4 text-white mb-0">Dieng Plateau</a>
								</div>
								<a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#">Pesan Sekarang</a>
							</div>
							<div class="service-content pb-4">
								<a href="#">
									<h4 class="text-white mb-4 py-3">Dieng Plateau</h4>
								</a>
								<div class="px-4">
									<p class="mb-4">Dieng Plateau tempat wisata menarik di Dataran Tinggi Dieng yang selalu jadi tujuan favorit wisatawan sepanjang tahun. Berada di ketinggian 2.000 mdpl, objek wisata yang juga dikenal sebagai Dieng Plateau ini merupakan sebuah kaldera yang dikelilingi gunung aktif.</p>
									<?php if ($this->session->userdata('user')) : ?>
										<button class="btn btn-primary border-secondary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#tiketModal">Pesan Sekarang</button>
									<?php else : ?>
										<a class="btn btn-primary border-secondary rounded-pill py-3 px-5" href="<?= base_url() ?>login">Pesan Sekarang</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Services End -->