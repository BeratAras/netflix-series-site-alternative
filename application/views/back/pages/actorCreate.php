<?php $admin = $this->session->userdata('admin'); ?>
<?php if($this->session->userdata('status')){ ?>
<?php $this->load->view('back/include/head') ?>

<link rel="stylesheet"
    href="<?php echo base_url('public/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view('back/include/navbar') ?>

        <?php $this->load->view('back/include/sidebar') ?>

        <div class="content-wrapper">
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Aktör Ekle</h3>
                    </div>
                    <form method="POST" action="<?php echo base_url('back/Dashboard/actorCreate') ?>"
                        enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Adı</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Doğum Günü</label>
                                        <input type="date" name="birthday" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Doğum Yeri</label>
                                        <input type="text" name="birthplace" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Biyografisi</label>
                                <textarea name="bio" class="form-control" rows="25"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fotoğrafı</label>
                                        <input type="text" name="img" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Durumu</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
                        </div>
                    </form>
                </div>

            </section>
        </div>


        <?php $this->load->view('back/include/footer') ?>

        <?php }else{$this->load->view('back/login');} ?>