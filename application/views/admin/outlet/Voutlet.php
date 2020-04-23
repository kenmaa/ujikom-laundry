<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.min.css') ?>">

    <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.bootstrap4.min.js') ?>"></script>
</head>
<body>
	<?php if ($this->session->has_userdata('username')): ?>
	<div class="row">
		<div class="col-md-12">
			<?php $this->load->view('admin/VheaderAdmin') ?>
		</div>
	</div>

	<?php if (!empty($this->session->flashdata('status'))): ?>
		<div class="alert alert-success">
			<?= $this->session->flashdata('status') ?>
		</div>
	<?php endif ?>

	<div class="container">
		<div class="row mt-3">
			<div class="col-md-12">
				<table class="table is-narrow" id="tabeloutlet">
        <thead>
        	<tr class="table-active">
          		<th>No</th>
          		<th>Id Outlet</th>
          		<th>Nama Outlet</th>
          		<th>Alamat Outlet</th>
          		<th>Telepon Outlet</th>
          		<th>Aksi</th>
        	</tr>
        </thead>
        <tbody>
        <?php 
		$i=1;
		foreach ($data as $d) :?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= $d['id_outlet'] ?></td>
				<td><?= $d['nm_outlet'] ?></td>
				<td><?= $d['alamat_outlet'] ?></td>
				<td><?= $d['tlp_outlet'] ?></td>
				<td align="center">
					<a href="<?php echo site_url('App_controlerAdmin/CeditOutlet/'.$d['id_outlet']) ?>" class="btn btn-outline-warning">Edit </a>
					<a href="<?php echo site_url('App_controlerAdmin/ChapusOutlet/' . $d['id_outlet']) ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus')"> Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>
        </tbody>
      </table> 
			</div>
		</div>
	</div>

    <script>   
	        $(document).ready(function() {
	            $('#tabeloutlet').DataTable();
	        } );
 	   </script> 
			
	<div class="row">
		<div class="container">
			<a href="<?php echo site_url('App_controlerAdmin/CtambahOutlet') ?>" class="btn btn-success"> Tambah Outlet</a>
		</div>
	</div>
<?php else: ?>
	<?php $this->load->view('Vlogin') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>