 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Administrator</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- QUERY MENU -->
<?php
$role_id = $this->session->userdata('role_id');
$queryMenu = "SELECT 'user_menu'.'id', 'menu'
              from  'user_menu' JOIN 'user_access_menu'
              ON 'user_menu'.'id' = 'user_access_menu'.'menu_id'
              where 'user_access_menu'.'role_id' = $role_id
              order by 'user_access_menu'.'menu_id' ASC";
$menu = $this->db->query($queryMenu)->result_array();
?>

<!-- LOOPING MENU-->
<?foreach ($menu as $m) : ?>
<div class="sidebar-heading">
   <?php echo $m['menu']; ?>
</div>
<?php endforeach; ?>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    User
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-user"></i>
        <span>My Profile</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

 <!-- Nav Item - Charts -->
 <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
