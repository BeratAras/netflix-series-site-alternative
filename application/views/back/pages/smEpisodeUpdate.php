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
            <section class="content-header">
                <a href="javascript:javascript:history.go(-1)">
                    <i class="fa fa-angle-double-left fa-4x"></i>
                </a>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div><?php echo $this->session->flashdata('EpisodeUpdate'); ?></div>
                        <p class="h2"><?php echo $episode->ep_name ?> Bölümünü Güncelliyorsunuz. (<?php echo $episode->ep_season ?>. Sezon <?php echo $episode->ep_episode ?>. Bölüm)</p>
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div>
                                    <form method="POST" action="<?php echo base_url('back/Dashboard/smEpisodeUpdate') ?>" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Sezon</label>
                                            <div class="col-sm-10">
                                                <select name="season" class="form-control">
                                                    <option><?php echo $episode->ep_season ?></option>
                                                    <?php for ($i=1; $i <= 25; $i++) { ?>
                                                        <option><?php echo $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Bölüm</label>
                                            <div class="col-sm-10">
                                                <select name="episode" class="form-control">
                                                    <option><?php echo $episode->ep_episode ?></option>
                                                    <?php for ($i=1; $i <= 50; $i++) { ?>
                                                        <option><?php echo $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Bölüm Adı</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" value="<?php echo $episode->ep_name ?>">
                                                <input type="hidden" name="epId" value="<?php echo $episode->ep_id ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Bölüm Frame</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="frame" class="form-control" value="<?php echo $episode->ep_frame ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Bölüm Tipi</label>
                                            <div class="col-sm-10">
                                                <?php $type = $episode->ep_type; ?>
                                                <select name="type" class="form-control">
                                                    <option value="<?php echo $type ?>"><?php if($type == 0){ echo 'Normal'; }elseif($type == 1){ echo 'Sezon Finali'; }else{ echo 'Final'; }  ?></option>
                                                    <option value="0">Normal</option>
                                                    <option value="1">Sezon Finali</option>
                                                    <option value="2">Final</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-success">Güncelle</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>



        </section>
    </div>


    <?php $this->load->view('back/include/footer') ?>

    <?php }else{$this->load->view('back/login');} ?>