<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paket Laundry</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

</head>
<body>
	<?php if ($this->session->has_userdata('username')): ?>

	<div class="row">
		<div class="col-md-12">
			<?php $this->load->view('Vheader') ?>
		</div>
	</div>

    <!-- mengecek apakah berhasil input ke keranjang -->
    <?php if (!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-primary">
            <?= $this->session->flashdata('status') ?>
        </div>
    <?php endif ?>
    <!-- end cek kerangang -->
    <div class="row">
        <div class="col-md-12">
            <?= $paketan ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $standar ?>
        </div>
    </div>
	 
<?php else: ?>
	<?php $this->load->view('Vlogin') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>