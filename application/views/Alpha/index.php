<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Pemilihan Parameter α</h4>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="p-4 col-md=12">
                                        <blockquote class="blockquote">
                                            <p>Ketepatan metode ramalan
                                                dilihat dari kesalahan peramalan.Kesalahan
                                                peramalan merupakan ukuran ketepatan dan
                                                menjadi dasar untuk membandingkan
                                                kinerja <br><br>Dalam tugas akhir UAS ini digunakan Mean
                                                Absolute Percentage Error (MAPE) untuk
                                                pemilihan metode terbaik serta mengetahui
                                                ketepatan peramalan</p>
                                        </blockquote>
                                        <div class="dropdown-divider"></div>

                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class="flash-data-news"
                                            data-flashdata="<?= $this->session->flashdata('flash') ?>">

                                        </div>
                                        <div class="flash-data-data"
                                            data-flashdata="<?= $this->session->flashdata('data') ?>">
                                        </div>
                                        <!-- <?= $alpha['alpha']?> -->
                                        <h3 class="d-flex justify-content-center">α saat ini = <?= $alpha['alpha']?>
                                        </h3>

                                        <form action="<?= base_url('alpha') ?>" method="POST">

                                            <div class="form-group ">
                                                <label for="alpha">Ubah Parameter α</label>
                                                <select class="form-control" id="alpha" name="alpha">
                                                    <option selected disabled>Pilih Parameter α</option>
                                                    <option value="0.10">0.10</option>
                                                    <option value="0.20">0.20</option>
                                                    <option value="0.30">0.30</option>
                                                    <option value="0.40">0.40</option>
                                                    <option value="0.50">0.50</option>
                                                    <option value="0.60">0.60</option>
                                                    <option value="0.70">0.70</option>
                                                    <option value="0.80">0.80</option>
                                                    <option value="0.90">0.90</option>


                                                </select>
                                                <?= form_error('alpha', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="d-flex justify-content-center">

                                                <button type="submmit" class="btn btn-success mx-auto">Simpan</button>
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