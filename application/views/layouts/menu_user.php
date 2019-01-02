<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
  <li class="nav-item nav-profile">
    <a href="<?php echo site_url('profile') ?>" class="nav-link">
      <div class="nav-profile-image">
        <img src="<?= base_url() ?>public/images/faces/<?php echo $this->session->userdata('photo') ?>" alt="profile">
        <span class="login-status online"></span> <!--change to offline or busy as needed-->              
      </div>
      <div class="nav-profile-text d-flex flex-column">
        <span class="font-weight-bold mb-2"><?php echo ucwords($this->session->userdata('username')) ?></span>
        <span class="text-secondary text-small">Student</span>
      </div>
      <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
      <span class="menu-title">Dashboard</span>
      <i class="mdi mdi-home menu-icon"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('discuss') ?>">
      <span class="menu-title">Discuss</span>
      <i class="mdi mdi-wechat menu-icon"></i>
    </a>
  </li>
  <?php 
    if ($this->session->userdata('role_id') == 2) {
      # code...
  ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('categories') ?>">
      <span class="menu-title">Categories</span>
      <i class="mdi mdi-pencil menu-icon"></i>
    </a>
  </li>
  <?php } ?>
</ul>
</nav>