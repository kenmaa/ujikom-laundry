<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah User</title>
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
    <?= form_open('App_controlerAdmin/CprosesTambahUser', ['method' => 'POST']) ?>
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" class="form-control" name="nm_user" placeholder="Nama User">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="form-control" for="inputGroupSelect01">Id Outlet</label>
                </div>
                    <select class="custom-select" name="id_outlet">
                        <?php foreach ($outlets as $l) : ?>
                            <option value="<?= $l['id_outlet'] ?>"><?= $l['id_outlet'] ?></option>
                        <?php endforeach ?>
                    </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Role</label>
                </div>
                    <select class="custom-select" name="role">
                        <option value="kasir">kasir</option>
                        <option value="owner">owner</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
            <input type="submit" class="btn btn-success" value="Input">
    <?= form_close()?>

	<?php else: ?>
    	<?php $this->load->view('Vlogin') ?>
	<?php endif ?>
</body>
</html>