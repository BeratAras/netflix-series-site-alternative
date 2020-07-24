

<?php $this->load->view('back/include/head') ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('/') ?>"><b>Scenamater</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Hoşgeldin!</p>

    <form action="<?php echo base_url('Back/Dashboard/login') ?>" method="POST">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Şifre">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox ">
            <label>
              <input type="checkbox"> Beni Hatırla
            </label>
          </div>
        </div>
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Giriş</button>
        </div>
      </div>
    </form>

  </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('public/back/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('public/back/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

</body>
</html>
