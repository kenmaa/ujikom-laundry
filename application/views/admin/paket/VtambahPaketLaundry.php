<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Paket Laundry</title>
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
    <?= form_open('App_controlerAdmin/CprosesTambahPaketLaundry', ['method' => 'POST']) ?>
            <div class="form-group">
                <label>Id Outlet</label>
                <input type="text" class="form-control" name="id_outlet" placeholder="Id Outlet">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Jenis Paket</label>
                </div>
                    <select class="custom-select" name="jenis_paket">
                        <option value="paketan">paketan</option>
                        <option value="standar">standar</option>
                    </select>
            </div>
            <div class="form-group">
                <label>Nama Paket</label>
                <input type="text" class="form-control" name="nm_paket" placeholder="Nama Paket">
            </div>
             <div class="form-group">
                <label>Harga Paket</label>
                <input type="text" class="form-control" name="harga_paket" placeholder="Harga Paket">
            </div>
             <div class="form-group">
                <label>Deskripsi Paket</label>
                <input type="text" class="form-control" name="deskripsi_paket" placeholder="Deskripsi Paket">
            </div>
            <input type="submit" class="btn btn-success" value="Input">
    <?= form_close()?>

	<?php else: ?>
    	<?php $this->load->view('Vlogin') ?>
	<?php endif ?>
</body>
</html>