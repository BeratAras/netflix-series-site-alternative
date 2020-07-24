<?php $this->load->view('front/include/head') ?>
<?php $this->load->view('front/include/navbar') ?>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Giriş Yap</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog list section-->
<div class="page-single">
	<div class="container">
		<div class="row register-form">
            <div class="col-md-3"></div>
			<div class="col-md-6">
                <div class="alert alert-danger text-center"><?php echo $form_errors ?></div>
                <form method="POST" action="<?php echo base_url('UserAuth/login') ?>"> 
                    <div class="form-group">
                        <label>Kullanıcı Adı:</label>
                        <input type="text" value="<?php echo isset($form_errors) ? set_value("username") : "" ?>" name="username" required="required">
                    </div>
                    <div class="form-group">
                        <label>Şifre:</label>
                        <input type="password" name="password" required="required">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Beni Hatırla</label>
                    </div>
                    <button type="submit">Giriş</button>
                </form>
            </div>
            <div class="col-md-3"></div>
		</div>
	</div>
</div>
<!--end of blog list section-->


<?php $this->load->view('front/include/footer') ?>

