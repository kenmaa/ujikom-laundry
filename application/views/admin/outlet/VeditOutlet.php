<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Outlet</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
	<?php if ($this->session->has_userdata('username')): ?>
	<div class="row">
		<div class="col-md-12">
			<?php $this->load->view('admin/VheaderAdmin') ?>
		</div>
	</div>

	<div class="container mt-4">
  <div class="row justify-content-md-center">
    <div class="card col-8">
      <div class="card-body">
    <?= form_open('App_controlerAdmin/CprosesEditOutlet/'.$data['id_outlet'], ['method' => 'POST']) ?>
            <div class="form-group">
                <label>Nama Outlet</label>
                <input type="text" class="form-control" name="nm_outlet" required value="<?= $data['nm_outlet']?>">
            </div>
            <div class="form-group">
                <label>Alamat Outlet</label>
                <input type="text" class="form-control" name="alamat_outlet" required value="<?= $data['alamat_outlet']?>">
            </div>
            <div class="form-group">
                <label>Telepon Outlet</label>
                <input type="number" class="form-control" name="tlp_outlet" required value="<?= $data['tlp_outlet']?>">
            </div>
            <input type="submit" class="btn btn-success" value="Edit">
    <?= form_close()?>

	<?php else: ?>
    	<?php $this->load->view('Vlogin') ?>
	<?php endif ?>
</body>
</html>