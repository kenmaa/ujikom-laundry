<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Laundry Express</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('App_controlerAdmin/CTampilDataUser') ?>">Data User <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('App_controlerAdmin/CTampilDataOutlet')?>">Data Outlet</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?= site_url('App_controlerAdmin/CTampilDataPaketLaundry')?>">Data Paket Laundry</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-outline-success ml-1" href="<?= site_url('App_controler/Clogout')?>">Logout</a>
    </form>
  </div>
</nav>

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>