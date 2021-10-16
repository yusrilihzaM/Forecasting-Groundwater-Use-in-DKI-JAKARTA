<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?=$nama?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.png">
    <link href="<?=base_url()?>assets/libs/chartist/chartist.min.css" rel="stylesheet">
    <!-- datepicker -->
    <link href="<?= base_url() ?>assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />
    
    <!-- jvectormap -->
    <link href="<?= base_url() ?>assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

    <!-- DataTables -->
    <link href="<?= base_url() ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="<?= base_url(); ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?= base_url(); ?>assets/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" /> -->

    </head>

    <body class="bg-primary bg-pattern">
        <div class="home-btn d-none d-sm-block">
            <a href="<?=base_url()?>"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="<?=base_url()?>" class="logo"><img src="<?=base_url()?>assets/images/logo-light.png" height="50%" alt="logo"></a>
                            
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Membuat Akun Baru</h5>
                                    <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash1') ?>">

</div>
<div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data1') ?>">
</div>
                                    <div class="flash-data-news"
                                            data-flashdata="<?= $this->session->flashdata('flash') ?>">

                                        </div>
                                        <div class="flash-data-data"
                                            data-flashdata="<?= $this->session->flashdata('data') ?>">
                                        </div>
                                    <form class="form-horizontal" action="<?= base_url('auth/registration')?>" method="post">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" name="username" id="username" required>
                                                    <label for="username">Username</label>
                                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                              
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control" id="password" name="password"required>
                                                    <label for="password">Password</label>
                                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                               
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Daftar</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="<?=base_url()?>auth" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Sudah Memiliki Akun?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>

<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

<!-- datepicker -->
<script src="<?= base_url(); ?>assets/libs/air-datepicker/js/datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

<!-- apexcharts -->
<script src="<?= base_url(); ?>assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="<?= base_url(); ?>assets/libs/jquery-knob/jquery.knob.min.js"></script>

<!-- Jq vector map -->
<script src="<?= base_url(); ?>assets/libs/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="<?= base_url(); ?>assets/js/pages/dashboard.init.js"></script>

<script src="<?= base_url(); ?>assets/js/app.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script>

<script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script>
<!-- Summernote js -->

<!-- <script src="<?= base_url(); ?>assets/libs/summernote/summernote-bs4.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/libs/summernote/summernote-bs4.js"></script> -->
<!-- Sweet Alerts js -->
<script src="<?= base_url(); ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url(); ?>assets/js/pages/sweet-alerts.init.js"></script>
<!-- init js -->
<!-- <script src="<?= base_url(); ?>assets/js/pages/summernote.init.js"></script> -->

<!-- <script type="text/javascript" src="<?= base_url(); ?>'assets/js/jquery-3.4.0.min.js'; ?>"></script> -->
<script type="text/javascript" src="<?= base_url(); ?>'assets/js/bootstrap.bundle.js'; ?>"></script>
<script src="<?= base_url() ?>assets/js/auth.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>'assets/summernote/summernote-bs4.js'; ?>"></script>
<!-- Chart JS -->
<script src="<?= base_url() ?>assets/libs/chart.js/Chart.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/chartjs.init.js"></script>

<!-- Plugin Js-->
<script src="<?= base_url() ?>assets/libs/chartist/chartist.min.js"></script>
<script src="<?= base_url() ?>assets/libs/chartist-plugin-tooltips-updated/chartist-plugin-tooltip.min.js"></script>
<!-- demo js-->
<script src="<?= base_url() ?>assets/js/pages/chartist.init.js"></script>
<!-- Plugin Js-->
<script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- demo js-->
<script src="<?= base_url() ?>assets/js/pages/apex.init.js"></script>
    </body>
</html>
