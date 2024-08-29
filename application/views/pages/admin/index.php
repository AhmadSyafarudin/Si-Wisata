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
	<h1 class="tiket-header">Daftar Pesanan</h1>
	<div class="card table-responsive">
		<div class="card-body">
			<table class="dataTable table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>No. WhatsApp</th>
						<th>Alamat</th>
						<th>Destinasi Wisata</th>
						<th>Tanggal Perjalanan</th>
						<th>Tanggal Pulang</th>
						<th>Jumlah Peserta</th>
						<th>Layanan</th>
						<th>Jumlah Tagihan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($tiket->result() as $key => $value) :
					?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->no_wa ?></td>
							<td><?= $value->alamat ?></td>
							<td><?= $value->destinasi_wisata ?></td>
							<td><?= date('d M Y', strtotime($value->tanggal_perjalanan)) ?></td>
							<td><?= date('d M Y', strtotime($value->tanggal_pulang)) ?></td>
							<td><?= $value->jumlah_peserta . ' Orang' ?></td>
							<td>
								<?php
								$layanan = explode(',', $value->layanan);
								echo implode(', ', $layanan);
								?>
							</td>
							<td><?= Rupiah($value->jumlah_tagihan) ?></td>
							<td>
								<button class="btn btn-sm btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#tiketModal" data-id="<?= $value->id_tiket ?>"><i class="fa fa-edit"></i> edit</button>
								<br>
								<br>
								<button class="btn btn-sm btn-primary text-white btn-hapus" data-id="<?= $value->id_tiket ?>"><i class="fa fa-trash"></i> hapus</button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>No. WhatsApp</th>
						<th>Alamat</th>
						<th>Destinasi Wisata</th>
						<th>Tanggal Perjalanan</th>
						<th>Tanggal Pulang</th>
						<th>Jumlah Peserta</th>
						<th>Layanan</th>
						<th>Jumlah Tagihan</th>
						<th>Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>

<?php $this->load->view('pages/tiket_form/index') ?>