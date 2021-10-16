<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1"><?= $nama?></h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>

                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">


                                <div class="row d-flex justify-content-center ">
                                    <div class="col-md-10 p-4">
                                        <div class="flash-data-news"
                                            data-flashdata="<?= $this->session->flashdata('flash') ?>">

                                        </div>
                                        <div class="flash-data-data"
                                            data-flashdata="<?= $this->session->flashdata('data') ?>">
                                        </div>
                                        <!-- <?= $alpha['alpha']?> -->

                                        </h3>

                                        <form action="<?= base_url('kecamatan/tambah') ?>" method="POST">

                                            <div class="form-group">
                                                <label for="exampleInputkecamatan">Nama Kecamatan</label>
                                                <input type="text" class="form-control" id="exampleInputkecamatan"
                                                    aria-describedby="kecamatan" name="kecamatan" placeholder="Masukan Nama Kecamatan">
                                                    <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="d-flex justify-content-center">

                                                <button type="submmit" class="btn btn-success mx-auto mdi mdi-content-save">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->