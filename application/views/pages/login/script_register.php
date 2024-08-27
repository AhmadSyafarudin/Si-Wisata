<script>
	$(document).ready(function() {
		$('#form-register').submit(function(e) {
			e.preventDefault();
			Swal.fire({
				title: 'Tunggu Sebentar',
				html: 'Sedang Memproses Registrasi',
				timerProgressBar: true,
				didOpen: () => {
					Swal.showLoading()
				}
			})

			$.ajax({
				url: '<?= base_url('register/add') ?>',
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
				success: function(data) {
					console.log(data);
					if (data.status == 'success') {
						Swal.fire({
							icon: 'success',
							title: 'Registrasi Berhasil',
							text: 'Silahkan login untuk melanjutkan',
							showConfirmButton: false,
							timer: 1500
						})
						setTimeout(function() {
							window.location.href = '<?= base_url('login') ?>';
						}, 1500);
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Registrasi Gagal',
							text: data.msg,
						})
					}
				}
			})
		})
	})
</script>