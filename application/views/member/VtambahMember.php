<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Member</title>
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

	<div class="container mt-4">
  <div class="row justify-content-md-center">
    <div class="card col-8">
      <div class="card-body">
    <?= form_open('App_controler/CprosesTambahMember', ['method' => 'POST']) ?>
            <div class="form-group">
                <label>Nama Member</label>
                <input type="text" class="form-control" name="nm_member" placeholder="Nama Member">
            </div>
            <div class="form-group">
                <label>No Telp</label>
                <input type="number" class="form-control" name="tlp_member" placeholder="No Telp">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat_member" placeholder="Alamat">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                </div>
                    <select class="custom-select" name="jk_member">
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                </div>
            <input type="submit" class="btn btn-success" value="Input">
    <?= form_close()?>

	<?php else: ?>
    	<?php $this->load->view('Vlogin') ?>
	<?php endif ?>
</body>
</html>