<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
  <li class="nav-item nav-profile">
    <a href="#" class="nav-link">
      <div class="nav-profile-image">
        <img src="../public/images/faces/face1.jpg" alt="profile">
        <span class="login-status online"></span> <!--change to offline or busy as needed-->              
      </div>
      <div class="nav-profile-text d-flex flex-column">
        <span class="font-weight-bold mb-2">David Grey. H</span>
        <span class="text-secondary text-small">Project Manager</span>
      </div>
      <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="<?php base_url('dashboard') ?>">
      <span class="menu-title">Dashboard</span>
      <i class="mdi mdi-home menu-icon"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
      <span class="menu-title">Discuss</span>
      <i class="mdi mdi-wechat menu-icon"></i>
    </a>
  </li>
</ul>
</nav>