<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{base_url}packages/theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <?php

            foreach ($allowed_modules as $module) {
                if (sizeof(explode('_', $module->module_id)) == 1) {
                    ?>
                    <li <?php if ($module->module_id == $controller_name){ ?>class="active"<?php } ?>>
                        <a href="#<?php echo $module->module_id; ?>">
                            <i class="fa <?php echo $module->icon; ?>"></i>
                            <span><?php echo $this->lang->line("module_" . $module->module_id) ?>	</span>
                        </a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>