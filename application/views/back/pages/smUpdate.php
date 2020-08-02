<?php $admin = $this->session->userdata('admin'); ?>
<?php if($this->session->userdata('status')){ ?>
<?php $this->load->view('back/include/head') ?>

<link rel="stylesheet"
    href="<?php echo base_url('public/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view('back/include/navbar') ?>

        <?php $this->load->view('back/include/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dizi & Film Ekle</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="<?php echo base_url('back/Dashboard/smUpdate') ?>"
                        enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Adı</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $contents->content_name ?>" placeholder="Dizi & Film Adı">
                                        <input type="hidden" name="id" value="<?php echo $contents->content_id ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tür</label>
                                        <select class="form-control" data-placeholder="Seç" name="kind">
                                            <option><?php echo $contents->content_kind ?></option>
                                            <option>Komedi</option>
                                            <option>Dram</option>
                                            <option>Korku</option>
                                            <option>Eğlence</option>
                                            <option>Belgesel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Yönetmen</label>
                                        <input type="text" name="director" class="form-control" value="<?php echo $contents->content_director ?>"
                                            placeholder="Dizi & Film Yönetmeni">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Yazar</label>
                                        <input type="text" name="writer" class="form-control" value="<?php echo $contents->content_writer ?>"
                                            placeholder="Dizi & Film Yazarı">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Konu</label>
                                <textarea name="description" class="form-control" rows="25"><?php echo $contents->content_description ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Dış Banner</label>
                                        <input type="file" name="out_banner">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>İç Banner</label>
                                        <input type="file" name="in_banner">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Trailer</label>
                                        <textarea type="text" name="trailer" class="form-control" placeholder="Embed Kodunu Girin"><?php echo $contents->content_trailer ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Anahtar Kelimeler</label>
                                        <input type="text" name="keywords" class="form-control" value="<?php echo $contents->content_keywords ?>"
                                            placeholder="Anahtar Kelimeler">
                                        <small>Lütfen her kelimenin arasına virgül koyunuz!</small>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Tip</label>
                                        <select class="form-control" name="type">
                                            <option><?php echo $contents->content_type ?></option>
                                            <option>Series</option>
                                            <option>Movie</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </section>
        </div>


        <?php $this->load->view('back/include/footer') ?>

        <?php }else{$this->load->view('back/login');} ?>