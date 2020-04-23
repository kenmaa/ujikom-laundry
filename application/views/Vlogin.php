<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <title> Login </title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

</head>
<body>

<div class="container mt-4">
  <div class="row justify-content-md-center">
    <div class="card col-4">
      <div class="card-body">
        <h2>Login</h2><hr>
<?php if (!empty($this->session->flashdata('message'))) :?>
    <div class="alert alert-warning">
    <p><?= $this->session->flashdata('message'); ?></p>
    </div>
<?php endif ?>

    <?= form_open('App_controler/CProsesLogin', ['method' => 'POST']) ?>
            <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" class="form-control" name="username" placeholder="Nama Pengguna">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <input type="submit" class="btn btn-success" value="Login">
    <?= form_close()?>
      </div>
    </div>
  </div>
</div>
</body>
</html>