<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pembayaran</title>
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
			<?php $this->load->view('Vheader') ?>
		</div>
	</div>

   <?php if (!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-primary">
            <?= $this->session->flashdata('status') ?>
        </div>
    <?php endif ?>


    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table is-narrow" id="tabelpembayaran">
                    <thead align="center">
                        <tr class="table-active">
                            <th>No</th>
                            <th>Nama Member</th>
                            <th>Kode Invoice</th>
                            <th>Status Transaksi</th>
                            <th>Status Pembayaran</th>
                            <th>No Kontak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach ($data as $a) :?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $a['nm_member'] ?></td>
                            <td><?= $a['kode_invoice'] ?></td>
                            <td><?= $a['status_transaksi'] ?></td>
                            <td><?= $a['status_pembayaran'] ?></td>
                            <td><?= $a['tlp_member'] ?></td>
                            <td align="center">
                            <?php if ($a['status_pembayaran'] != 'dibayar') :?>
                                <a href="<?php echo site_url('App_controler/CProsesTampilPembayaran/'.$a['id_transaksi']) ?>" class="btn btn-outline-success"> Bayar </a>
                                <a href="<?php echo site_url('App_controler/CHapusPembayaran/'.$a['id_transaksi']) ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus')"> Hapus </a>
                            <?php endif ?>
                            <?php if ($a['status_transaksi'] == 'proses') :?>
                                <a href="<?php echo site_url('App_controler/CTampilSelesai/'.$a['id_transaksi']) ?>" class="btn btn-outline-success" onclick="return confirm('Yakin Apakah Barang Telah selesai Dicuci')"> Selesai </a>
                            <?php endif ?>
                            <?php if (($a['status_pembayaran'] == 'dibayar') && ($a['status_transaksi'] != 'diambil') && ($a['status_transaksi'] != 'proses')):?>
                                <a href="<?php echo site_url('App_controler/CProsesTampilPengambilan/'.$a['id_transaksi']) ?>" class="btn btn-outline-success"> Ambil </a>
                            <?php endif ?>
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
            $('#tabelpembayaran').DataTable();
        } );
  </script>  
	 
<?php else: ?>
	<?php $this->load->view('Vlogin') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>