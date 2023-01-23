<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">
    <?php
    $role = '';
    if ($user['role_id'] == 1) {
        $role = 'admin';
    } else {
        $role = 'user';
    }
    ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url($role . '/index'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-desktop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">STUDIO-IPSI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');

    $queryMenu = "SELECT * FROM `user_menu` 
    WHERE `role_id` = $role_id
    ";


    $menu = $this->db->query($queryMenu)->result_array();
    // looping menu
    ?>
    <?php foreach ($menu as $m) : ?>
        <?php if ($title == $m['title']) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url($m['url']); ?>">
                <i class="<?= $m['icon']; ?>"></i>
                <span><?= $m['title']; ?></span></a>
            </li>
        <?php endforeach; ?>

        <!-- Nav Item - Dashboard -->
        <!-- <li class="nav-item">
        <a class="nav-link" href=" ">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Pesanan Saya</span></a>
    </li> -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->