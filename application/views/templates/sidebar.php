<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-2" href="">
        <div class="sidebar-brand-icon mt-2">
            <img src="<?= base_url('images/timekeeping.png'); ?>" alt="Logo"
                style="max-width: 100%; height: auto; max-height: 50px;">
        </div>
        <div class="sidebar-brand-text mx-2">Timekeeping</div>
    </a>

    <!-- Query Menu -->
    <?php
    $role_id =$this->session->userdata('role_id');

    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                  FROM `user_menu` JOIN `user_access`
                  ON `user_menu`.`id` = `user_access`.`menu_id`
                  WHERE `user_access`.`role_id` = $role_id
                  ORDER BY `user_access`.`menu_id` ASC";

    $menu = $this->db->query($queryMenu)->result_array();

    foreach ($menu as $mn):
    ?>
    <div class="sidebar-heading">
        <?= $mn['menu']; ?>
    </div>

    <?php
    $menuId = $mn['id'];

    $querySubMenu = "SELECT * FROM `user_submenu`
                     WHERE `menu_id` = $menuId
                     AND `is_active` = 1";

    $subMenu = $this->db->query($querySubMenu)->result_array();

    foreach ($subMenu as $sm):
        $activeClass = ($title == $sm['title']) ? 'nav-item active' : 'nav-item';
    ?>
    <li class="<?= $activeClass; ?>">
        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
            <i class="<?= $sm['icon']; ?>"></i>
            <span><?= $sm['title']; ?></span>
        </a>
    </li>
    <?php endforeach; ?>

    <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->