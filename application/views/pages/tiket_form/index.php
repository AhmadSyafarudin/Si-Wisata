<div class="modal fade" id="tiketModal" tabindex="-1" aria-labelledby="tiketModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content rounded-0">
			<div class="modal-header bg-secondary">
				<h4 class="modal-title text-white mb-0" id="tiketModalLabel">Form Pemesanan</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="card ">
					<div class="card-body">
						<form id="form-tiket" action="" method="POST">
							<input type="hidden" name="aksi" value="tambah" id="aksi" class="form-control" readonly>
							<input type="hidden" name="id_tiket" id="id_tiket" class="form-control" readonly>

							<div class="text-center mb-2">
								<h1 class="display-5 text-secondary m-0"><img src="<?= base_url() ?>assets/img/icon.png" class="img-fluid" alt=""> <span class="text-primary">Si</span>Wisata</h1>
							</div>
							<div class="form-group mb-1">
								<label for="nama" class="form-label">Nama Lengkap</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
							</div>
							<div class="form-group mb-1">
								<label for="no_wa" class="form-label">Nomor WhatsApp</label>
								<input type="number" name="no_wa" id="no_wa" class="form-control" placeholder="Masukkan Nomor WhatsApp" required>
							</div>
							<div class="form-group mb-1">
								<label for="alamat" class="form-label">Alamat</label>
								<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" required></textarea>
							</div>
							<div class="form-group mb-1">
								<label for="destinasi_wisata" class="form-label">Destinasi Wisata</label>
								<textarea name="destinasi_wisata" id="destinasi_wisata" class="form-control" placeholder="Masukkan Destinasi" required></textarea>
							</div>
							<div class="form-group mb-1">
								<label for="tanggal_perjalanan" class="form-label">Tanggal Perjalanan</label>
								<input type="date" name="tanggal_perjalanan" id="tanggal_perjalanan" class="form-control" required>
							</div>
							<div class="form-group mb-1">
								<label for="tanggal_pulang" class="form-label">Tanggal Pulang</label>
								<input type="date" name="tanggal_pulang" id="tanggal_pulang" class="form-control" required>
							</div>
							<div class="form-group mb-1">
								<label for="" class="form-label">Paket Pelayanan :</label>
								<div class="form-check">
									<label class="form-check-label" for="penginapan">
										Penginapan (Rp 1.000.000)
									</label>
									<input class="form-check-input" type="checkbox" name="penginapan" value="penginapan" id="penginapan">
								</div>
								<div class="form-check">
									<label class="form-check-label" for="transportasi">
										Transportasi (Rp 1.200.000)
									</label>
									<input class="form-check-input" type="checkbox" name="transportasi" value="transportasi" id="transportasi">
								</div>
								<div class="form-check">
									<label class="form-check-label" for="makan">
										Servis/Makan (Rp 500.000)
									</label>
									<input class="form-check-input" type="checkbox" name="makan" value="makan" id="makan">
								</div>
							</div>
							<div class="form-group mb-1">
								<label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
								<input type="number" name="jumlah_peserta" id="jumlah_peserta" class="form-control" required>
							</div>
							<div class="form-group mb-1">
								<label for="harga_paket" class="form-label">Harga Paket Perjalanan</label>
								<input type="text" name="" id="harga_paket_view" value="Rp0" class="form-control" readonly>
								<input type="hidden" name="harga_paket" id="harga_paket" value="Rp0" class="form-control" readonly>
							</div>
							<div class="form-group mb-1">
								<label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label>
								<input type="text" name="" value="Rp0" id="jumlah_tagihan_view" class="form-control" readonly>
								<input type="hidden" name="jumlah_tagihan" value="Rp0" id="jumlah_tagihan" class="form-control" readonly>
							</div>
							<div class="row mt-4">
								<div class="col-md-6">
									<button class="btn btn-primary text-center w-100 rounded mb-1" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Tidak</button>
								</div>
								<div class="col-md-6">
									<button class="btn btn-success text-center w-100 rounded mb-2 " type="submit"><i class="fas fa-file-alt"></i> Pesan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>