<?php $admin = $this->session->userdata('admin'); ?>
<?php if($this->session->userdata('status')){ ?>
<?php $this->load->view('back/include/head') ?>

<link rel="stylesheet" href="<?php echo base_url('public/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('back/include/navbar') ?>

  <?php $this->load->view('back/include/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
    
    <div><?php echo $this->session->flashdata('Insert'); ?></div>
    <div><?php echo $this->session->flashdata('Update'); ?></div>
    <div><?php echo $this->session->flashdata('Delete'); ?></div>
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Diziler & Filmler</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Adı</th>
                  <th>Biyografisi</th>
                  <th>Doğum Günü</th>
                  <th>Doğum Yeri</th>
                  <th>Fotoğrafı</th>
                  <th>Durumu</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($actors as $actor){ ?>
                        <tr>
                            <td><?php echo $actor->actor_name ?></td>
                            <td><?php echo $actor->actor_bio ?></td>
                            <td><?php echo $actor->actor_birthday ?></td>
                            <td><?php echo $actor->actor_birthplace ?></td>
                            <td>
                                <img src="<?php echo $actor->actor_img ?>" alt="<?php echo $actor->actor_name ?>" width="100">
                            </td>
                            <td><?php echo $actor->actor_status == "1" ? "Aktif" : "Pasif" ?></td>
                            <td>
                              <a href="<?php echo base_url("nedmin/actor-update/$actor->actor_id") ?>" class="btn btn-warning">Güncelle</a>
                              <a href="<?php echo base_url("back/Dashboard/actorDelete/$actor->actor_id") ?>" class="btn btn-danger">Sil</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    
  
    
    </section>
  </div>


  <?php $this->load->view('back/include/footer') ?>

<?php }else{$this->load->view('back/login');} ?>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


<script src="<?php echo base_url('public/back/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('public/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

