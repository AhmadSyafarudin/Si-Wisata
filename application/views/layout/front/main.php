<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<body>
	<!-- Spinner Start -->
	<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
		<div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<!-- Spinner End -->

	<?php include('topbar.php'); ?>
	<?php include('navbar.php'); ?>
	<?php (!empty($page)) ? $this->load->view($page) : null; ?>

	<!-- Modal Search Start -->
	<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-fullscreen">
			<div class="modal-content rounded-0">
				<div class="modal-header bg-secondary">
					<h4 class="modal-title text-white mb-0" id="exampleModalLabel">Pencarian</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body d-flex align-items-center">
					<div class="input-group w-75 mx-auto d-flex">
						<input type="search" class="form-control p-3" placeholder="Apa yang Ingin Anda Cari?" aria-describedby="search-icon-1">
						<span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Search End -->

	<?php include('footer.php'); ?>
	<?php include('lib.php'); ?>
	<?php (isset($script) && !empty($script)) ? $this->load->view($script) : null; ?>

</body>

</html>