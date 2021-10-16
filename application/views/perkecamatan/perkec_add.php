<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Tambah Data Air </h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Kecamatan <?= $nama['kecamatan']?></li>
                        </ol>
                    </div>

                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="row d-flex justify-content-center ">
                                    <div class="col-md-10 p-3">
                                        <div class="flash-data-news"
                                            data-flashdata="<?= $this->session->flashdata('flash') ?>">

                                        </div>
                                        <div class="flash-data-data"
                                            data-flashdata="<?= $this->session->flashdata('data') ?>">
                                        </div>
                                        <!-- <?= $alpha['alpha']?> -->

                                        </h3>

                                        <form action="<?= base_url('kecamatan/saveair') ?>" method="POST">

                                           
                                            <div class="form-group row">
                                               
                                                <div class="col-md-6">
                                                    <input class="form-control" type="text"  name="id_kecamatan" value="<?= $dkc?>" hidden>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-month-input" class="col-md-4 col-form-label">Tahun & bulan</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="month" value="2021-01" id="example-month-input" name="bulan_tahun">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-number-input" class="col-md-4 col-form-label">Jumlah Air m3</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="number" placeholder="Masukan Jumlah Air m3" id="example-number-input" name="jumlah_air">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                            
                                            <button type="submit"
                                                    class="btn btn-success mx-auto mdi mdi-content-save">Simpan</button>
                                               
                                               
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