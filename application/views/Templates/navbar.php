<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="<?= base_url()?>home" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?=base_url()?>assets/images/favicon.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=base_url()?>assets/images/logo.png" alt="" width="85%">
                        </span>
                    </a>

                    <a href="<?= base_url()?>home" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?=base_url()?>assets/images/logo-sm-light.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=base_url()?>assets/images/logo-light.png" alt="" height="20">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                    id="vertical-menu-btn">
                    <i class="mdi mdi-backburger"></i>
                </button>

            
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                   
                </div>

            
           
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                            src="<?=base_url()?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                        <span class="d-none d-sm-inline-block ml-1"><?=$user['username']?></span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="<?=base_url()?>auth/logout"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i>
                            Logout</a>
                    </div>
                </div>

            </div>
        </div>

    </header>