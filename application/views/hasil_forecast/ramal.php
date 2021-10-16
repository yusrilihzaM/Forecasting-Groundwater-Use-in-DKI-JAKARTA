<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Ramal Data Penggunaan Air</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"><?= $nama_kc?></li>
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
                                            <p>Ramal Penggunaan Air di masa depan </p>
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

                                        </h3>

                                        <form action="<?= base_url('hasil/hitungramal') ?>" method="POST">
                                            <div class="form-group">
                                                
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="<?= $dt_kecamatan['id_kecamatan']?>"  hidden name="id_kecamatan">
                                                
                                            </div>
                                            <div class="form-group ">
                                                <label for="bulan">Ramal Penggunaan Air Kecamatan <?= $nama_kc?></label>
                                                <select class="form-control" id="bulan" name="bulan">
                                                    <option selected disabled>Pilih berapa bulan (m)</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>


                                                </select>
                                                <?= form_error('bulan', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="d-flex justify-content-center">

                                                <button type="submmit" class="btn btn-success mx-auto">Ramal</button>
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