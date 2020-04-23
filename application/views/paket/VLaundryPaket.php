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

	<div class="container mt-5">
        <div class="row">
        <?php foreach($data as $d) :?>
          <?= form_open('App_controler/CmasukKeranjang/'.$d['id_paket'], ['method' => 'POST']) ?>
          <div class="col-lg-4 ml-4">
              <div class="card" style="width: 20rem;">
                  <h5 class="card-header">Paket kiloan : <?=$d['nm_paket']?> <?= number_format($d['harga_paket'], 2, ',', '.')?></h5>
                  <div class="card-body">
                    <p class="card-text"><?= $d['deskripsi_paket'] ?></p>
                    <input type="number" name="kuantitas" value="1" class="form-control mb-4" >
                    <input type="submit" class="btn btn-primary" value="Keranjang">
                  </div>
              </div>
          </div>
          <?= form_close() ?>
        <?php endforeach ?>
        </div>
    </div>
	
	<?php else: ?>
  <?php $this->load->view('Vlogin') ?>
<?php endif ?>	
</body>
</html>