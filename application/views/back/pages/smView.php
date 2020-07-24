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
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive"
                                    src="<?php echo base_url('public/front/images/uploads/banner/out_banner/'.$contents->content_out_banner) ?>"
                                    alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $contents->content_name ?></h3>

                                <p class="text-muted text-center"><?php echo $contents->content_kind ?></p>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>İzlenme</b> <a class="pull-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Favoriler</b> <a class="pull-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Yorumlar</b> <a class="pull-right">13,287</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Sitede Görüntüle</b></a>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Hakkında</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Konu</strong>

                                <p class="text-muted">
                                    <?php echo $contents->content_description ?>
                                </p>

                                <hr>

                                <strong><i class="fa fa-street-view margin-r-5"></i> Yönetmen</strong>

                                <p class="text-muted"><?php echo $contents->content_director ?></p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Yazar</strong>

                                <p class="text-muted"><?php echo $contents->content_writer ?></p>

                                <hr>

                                <strong><i class="fa fa-italic margin-r-5"></i> Tipi</strong>

                                <p class="text-muted"><?php echo $contents->content_type ?></p>

                                <hr>

                                <strong><i class="fa fa-key margin-r-5"></i> Anahtar Kelimeler</strong>

                                <p>
                                    <span class="label label-info"><?php echo $contents->content_keywords ?></span>
                                </p>

                                <hr>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div><?php echo $this->session->flashdata('Episode'); ?></div>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Yorumlar</a></li>
                                <li><a href="#season" data-toggle="tab">Sezonlar ve Bölümler</a></li>
                                <li><a href="#episode" data-toggle="tab">Bölüm Ekle</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="pull-right btn-box-tool"><i
                                                        class="fa fa-times"></i></a>
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="season">
                                    <?php foreach($seasons as $season){ ?>
                                    <div class="box box-warning box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Sezon <?php echo $season->ep_season ?></h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                        class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="box-body">
                                            <?php  $result = getEpisode($season->ep_season, $contents->content_id); ?>

                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Bölüm</th>
                                                        <th>Tarih</th>
                                                        <th>Bölüm Tipi</th>
                                                        <th>İşlemler</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($result as $result){ ?>
                                                    <tr>
                                                        <td><?php echo $result->ep_episode ?>. Bölüm - <?php echo $result->ep_name ?></td>
                                                        <td><?php echo $result->ep_date ?></td>
                                                        <td><?php if($result->ep_type == 1){ echo 'Sezon Finali'; }elseif($result->ep_type == 2){ echo 'Final'; }else{ echo 'Normal'; } ?></td>
                                                        <td width="300">
                                                            <a href="<?php echo base_url("nedmin/sm-episode-view/$result->ep_id") ?>"
                                                                class="btn btn-success">Görüntüle</a>
                                                            <a href="<?php echo base_url("nedmin/sm-episode-update/$result->ep_id") ?>"
                                                                class="btn btn-warning">Güncelle</a>
                                                            <a href="<?php echo base_url("back/Dashboard/smEpisodeDelete/$result->ep_id") ?>"
                                                                class="btn btn-danger">Sil</a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="episode">
                                    <form method="POST"
                                        action="<?php echo base_url('back/Dashboard/smEpisodeCreate') ?>"
                                        class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Sezon</label>
                                            <div class="col-sm-10">
                                                <select name="season" class="form-control">
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
                                                    <?php for ($i=1; $i <= 50; $i++) { ?>
                                                    <option><?php echo $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Bölüm Adı</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control">
                                                <input type="hidden" name="contentId"
                                                    value="<?php echo $contents->content_id ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Bölüm Frame</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="frame" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Bölüm Tipi</label>
                                            <div class="col-sm-10">
                                                <select name="type" class="form-control">
                                                    <option value="0">Normal</option>
                                                    <option value="1">Sezon Finali</option>
                                                    <option value="2">Final</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Oluştur</button>
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

    <script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    </script>


    <script src="<?php echo base_url('public/back/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>">
    </script>
    <script
        src="<?php echo base_url('public/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>">
    </script>