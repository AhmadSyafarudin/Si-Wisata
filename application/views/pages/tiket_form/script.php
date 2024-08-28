<script>
	$(document).ready(function() {
		$('input[type="checkbox"]').change(function(e) {
			e.preventDefault()
			let harga_paket = 0
			$('input[type="checkbox"]:checked').each(function() {
				if ($(this).val() == 'penginapan') {
					harga_paket += 1000000
				} else if ($(this).val() == 'transportasi') {
					harga_paket += 1200000
				} else if ($(this).val() == 'makan') {
					harga_paket += 500000
				}
			})
			$('#harga_paket').val(harga_paket);
			$('#harga_paket_view').val(formatRupiah(harga_paket, 'Rp'));

			let jumlah_peserta = $('#jumlah_peserta').val()
			let tanggal_perjalanan = new Date($('#tanggal_perjalanan').val())
			let tanggal_pulang = new Date($('#tanggal_pulang').val())
			let jumlah_hari = Math.round(Math.abs(tanggal_pulang - tanggal_perjalanan) / (1000 * 3600 * 24)) + 1;
			let total_harga = harga_paket * jumlah_peserta * jumlah_hari
			$('#jumlah_tagihan').val(total_harga)
			$('#jumlah_tagihan_view').val(formatRupiah(total_harga, 'Rp'))
		})

		$('#jumlah_peserta').keyup(function() {
			let harga_paket = 0
			$('input[type="checkbox"]:checked').each(function() {
				if ($(this).val() == 'penginapan') {
					harga_paket += 1000000
				} else if ($(this).val() == 'transportasi') {
					harga_paket += 1200000
				} else if ($(this).val() == 'makan') {
					harga_paket += 500000
				}
			})
			$('#harga_paket').val(harga_paket);
			$('#harga_paket_view').val(formatRupiah(harga_paket, 'Rp'));

			let jumlah_peserta = $('#jumlah_peserta').val()
			let tanggal_perjalanan = new Date($('#tanggal_perjalanan').val())
			let tanggal_pulang = new Date($('#tanggal_pulang').val())
			let jumlah_hari = Math.round(Math.abs(tanggal_pulang - tanggal_perjalanan) / (1000 * 3600 * 24)) + 1;
			let total_harga = harga_paket * jumlah_peserta * jumlah_hari
			$('#jumlah_tagihan').val(total_harga)
			$('#jumlah_tagihan_view').val(formatRupiah(total_harga, 'Rp'))
		})

		$('input[type="date"]').change(function(e) {
			e.preventDefault()
			let harga_paket = 0
			$('input[type="checkbox"]:checked').each(function() {
				if ($(this).val() == 'penginapan') {
					harga_paket += 1000000
				} else if ($(this).val() == 'transportasi') {
					harga_paket += 1200000
				} else if ($(this).val() == 'makan') {
					harga_paket += 500000
				}
			})
			$('#harga_paket').val(harga_paket);
			$('#harga_paket_view').val(formatRupiah(harga_paket, 'Rp'));

			let jumlah_peserta = $('#jumlah_peserta').val()
			let tanggal_perjalanan = new Date($('#tanggal_perjalanan').val())
			let tanggal_pulang = new Date($('#tanggal_pulang').val())
			let jumlah_hari = Math.round(Math.abs(tanggal_pulang - tanggal_perjalanan) / (1000 * 3600 * 24)) + 1;
			let total_harga = harga_paket * jumlah_peserta * jumlah_hari
			$('#jumlah_tagihan').val(total_harga)
			$('#jumlah_tagihan_view').val(formatRupiah(total_harga, 'Rp'))
		})

		function formatRupiah(angka, prefix) {
			var number_string = angka.toString().replace(/[^,\d]/g, ''),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
		}

		var aksi = "tambah";
		$('.btn-edit').click(function(e) {
			e.preventDefault();
			$('#form-tiket').trigger('reset')
			let id = $(this).data('id');
			$('#id_tiket').val(id);
			aksi = "edit";

			$.ajax({
				url: "<?= base_url('tiket/get') ?>",
				type: 'post',
				data: 'id_tiket=' + id,
				dataType: 'json',
				success: function(data) {
					if (data.status == 'success') {
						$('#nama').val(data.tiket.nama)
						$('#no_wa').val(data.tiket.no_wa)
						$('#alamat').val(data.tiket.alamat)
						$('#destinasi_wisata').val(data.tiket.destinasi_wisata)
						$('#tanggal_perjalanan').val(data.tiket.tanggal_perjalanan)
						$('#tanggal_pulang').val(data.tiket.tanggal_pulang)
						$('#jumlah_peserta').val(data.tiket.jumlah_peserta)

						let layanan = data.tiket.layanan.toLowerCase()
						layanan = layanan.split(',')
						$('input[type="checkbox"]').prop('checked', false)
						layanan.forEach(function(item) {
							$('input[type="checkbox"][value="' + item + '"]').prop('checked', true)
						})

						$('#harga_paket').val(data.tiket.harga_paket)
						$('#harga_paket_view').val(formatRupiah(data.tiket.harga_paket, 'Rp'))
						$('#jumlah_tagihan').val(data.tiket.jumlah_tagihan)
						$('#jumlah_tagihan_view').val(formatRupiah(data.tiket.jumlah_tagihan, 'Rp'))
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Gagal',
							text: data.msg,
						})
						$('#modal-tiket').modal('hide')
					}
				}
			})
		})

		$('#form-tiket').submit(function(e) {
			e.preventDefault();
			let role = "<?= $this->session->userdata('user')->role ?>"
			Swal.fire({
				title: 'Tunggu Sebentar',
				text: 'Sedang Membuat Pesanan',
				allowOutsideClick: false,
				onBeforeOpen: () => {
					Swal.showLoading()
				}
			})

			if (aksi == 'edit') {
				var url = "<?= base_url('tiket/edit') ?>";
			} else {
				var url = "<?= base_url('tiket/add') ?>";
			}

			$.ajax({
				url: url,
				type: 'post',
				data: $(this).serialize(),
				dataType: 'json',
				success: function(data) {
					if (data.status == 'success') {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: data.msg,
						}).then((result) => {
							if (result.isConfirmed) {
								if (role == "Admin") {
									window.location.href = '<?= base_url('admin') ?>';
								} else {
									window.location.href = '<?= base_url('tiket') ?>';
								}
							}
						})
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Gagal',
							text: data.msg,
						})
					}
				}
			})
		})

		// hapus tiket
		$('.btn-hapus').click(function(e) {
			e.preventDefault();
			let role = "<?= $this->session->userdata('user')->role ?>"

			let id = $(this).data('id');
			Swal.fire({
				title: 'Apakah Anda Yakin?',
				text: "Data yang dihapus tidak dapat dikembalikan!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?= base_url('tiket/hapus') ?>",
						type: 'post',
						data: 'id_tiket=' + id,
						dataType: 'json',
						success: function(data) {
							if (data.status == 'success') {
								Swal.fire({
									icon: 'success',
									title: 'Berhasil',
									text: data.msg,
								}).then((result) => {
									if (result.isConfirmed) {
										if (role == "Admin") {
											window.location.href = '<?= base_url('admin') ?>';
										} else {
											window.location.href = '<?= base_url('tiket') ?>';
										}
									}
								})
							} else {
								Swal.fire({
									icon: 'error',
									title: 'Gagal',
									text: data.msg,
								})
							}
						}
					})
				}
			})
		})
	})
</script>