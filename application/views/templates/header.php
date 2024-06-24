<!DOCTYPE html>
<html>
<head>
    <title>CodeIgniter App</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <?php if ($this->session->userdata('logged_in')) : ?>
        <?php if ($this->session->userdata('role') == 'admin') : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('post/index'); ?>">Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('account/index'); ?>">Akun</a>
          </li>
        <?php elseif ($this->session->userdata('role') == 'author') : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('post/index'); ?>">Post</a>
          </li>
        <?php endif; ?>
      <?php endif; ?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php if ($this->session->userdata('logged_in')) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('auth/login'); ?>">Login</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<div class="container">
