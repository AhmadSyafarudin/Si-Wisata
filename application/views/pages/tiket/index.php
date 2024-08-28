<style>
	.tiket-header {
		text-transform: uppercase;
		font-weight: 900;
		border-left: 10px solid #fec500;
		padding-left: 10px;
		margin-bottom: 30px
	}

	.row {
		overflow: hidden
	}

	.tiket {
		display: table-row;
		width: 49%;
		background-color: #fff;
		color: #989898;
		margin-bottom: 10px;
		font-family: 'Oswald', sans-serif;
		border-radius: 4px;
		position: relative;
	}

	.card+.card {
		margin-left: 2%
	}

	.date {
		display: table-cell;
		width: 25%;
		position: relative;
		text-align: center;
		border-right: 2px dashed #dadde6
	}

	.date:before,
	.date:after {
		content: "";
		display: block;
		width: 30px;
		height: 30px;
		background-color: #f0f5fb;
		position: absolute;
		top: -15px;
		right: -15px;
		z-index: 1;
		border-radius: 50%
	}

	.date:after {
		top: auto;
		bottom: -15px
	}

	.date time {
		display: block;
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%)
	}

	.date time span {
		display: block
	}

	.date time span:first-child {
		color: #2b2b2b;
		font-weight: 600;
		font-size: 250%
	}

	.date time span:last-child {
		text-transform: uppercase;
		font-weight: 600;
		margin-top: -10px
	}

	.card-cont {
		display: table-cell;
		width: 75%;
		font-size: 85%;
		padding: 10px 10px 30px 50px
	}

	.card-cont h3 {
		color: #3C3C3C;
		font-size: 130%
	}


	.card-cont>div {
		display: table-row
	}

	.card-cont .even-date i,
	.card-cont .even-info i,
	.card-cont .even-date time,
	.card-cont .even-info p {
		display: table-cell
	}

	.card-cont .even-date i,
	.card-cont .even-info i {
		padding: 5% 5% 0 0
	}

	.card-cont .even-info p {
		padding: 30px 50px 0 0
	}

	.card-cont .even-date time span {
		display: block
	}


	@media screen and (max-width: 860px) {
		.card {
			display: block;
			float: none;
			width: 100%;
			margin-bottom: 10px
		}

		.card+.card {
			margin-left: 0
		}

		.card-cont .even-date,
		.card-cont .even-info {
			font-size: 75%
		}
	}

	.btn-edit {
		font-family: 'Poppins', sans-serif;
		font-weight: 400;
		transition: 0.5s;
	}

	.btn-edit:hover {
		background: var(--bs-primary) !important;
		color: white;
		border: 1px solid var(--bs-secondary);
	}

	.tagihan {
		border-style: dashed;
	}
</style>

<section class="container-fluid bg-light py-5">
	<h1 class="tiket-header">Tiket Pesanan</h1>
	<div class="row">
		<?php foreach ($tiket->result() as $key => $value) : ?>
			<div class="col-md-6 mb-2">
				<article class="tiket">
					<section class="date">
						<time>
							<span><?= ($key < 10) ? '#0' . ($key + 1) : '#' . ($key + 1); ?></span><span><?= date('Y', strtotime($value->tanggal_perjalanan)) ?></span>
						</time>
					</section>
					<section class="card-cont">
						<div class="d-flex justify-content-between">
							<div>
								<small><?= 'Destinasi : ' . $value->destinasi_wisata ?></small>
								<h3><?= $value->nama ?></h3>
							</div>
							<div>
								<p class="bg-primary text-white text-sm rounded-pill p-2">
									<i class="fa fa-user mx-1"></i>
									<?= $value->jumlah_peserta ?>

								</p>
							</div>
						</div>
						<div class="even-date">
							<i class="fa fa-calendar"></i>
							<span class="mx-2"><?= date('d M Y', strtotime($value->tanggal_perjalanan)) . ' s.d. ' . date('d M Y', strtotime($value->tanggal_pulang)) ?></span>
						</div>
						<div class="even-info">
							<i class="fa fa-map-marker"></i>
							<span class="mx-2">
								<?= $value->alamat ?>
							</span>
						</div>
						<br>
						<span class="bg-light text-secondary fw-bold border-secondary p-2 mx-2 tagihan">
							<?= Rupiah($value->jumlah_tagihan) ?>
						</span>
						<div class="float-end d-flex mx-2">
							<button class="btn btn-sm btn-warning mt-4 mx-2 btn-edit" data-bs-toggle="modal" data-bs-target="#tiketModal" data-id="<?= $value->id_tiket ?>"><i class="fa fa-edit"></i> edit</button>
							<button class="btn btn-sm btn-primary text-white mt-4 btn-hapus" data-id="<?= $value->id_tiket ?>"><i class="fa fa-trash"></i> hapus</button>
						</div>
					</section>
				</article>
			</div>
		<?php endforeach ?>
	</div>
</section>

<?php $this->load->view('pages/tiket_form/index') ?>