<script>
	$(document).ready(function() {
		$('#form-login').submit(function(e) {
			e.preventDefault();
			Swal.fire({
				title: 'Tunggu Sebentar',
				html: 'Sedang Memproses Login',
				timerProgressBar: true,
				didOpen: () => {
					Swal.showLoading()
				}
			})

			$.ajax({
				url: '<?= base_url('login/proses') ?>',
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
				success: function(data) {
					console.log(data);
					if (data.status == 'success') {
						Swal.fire({
							icon: 'success',
							title: 'Login Berhasil',
							text: '',
							showConfirmButton: false,
							timer: 1500
						})
						setTimeout(function() {
							window.location.href = '<?= base_url() ?>';
						}, 1500);
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Login Gagal',
							text: data.msg,
						})
					}
				}
			})
		})
	})
</script>