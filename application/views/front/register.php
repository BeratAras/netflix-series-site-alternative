<?php $this->load->view('front/include/head') ?>
<?php $this->load->view('front/include/navbar') ?>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Üye Ol</h1>
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
                <?php echo $form_errors ?>
                <form method="POST" action="<?php echo base_url('UserAuth/register') ?>"> 
                    <div class="form-group">
                        <label>Kullanıcı Adı:</label>
                        <input type="text" value="<?php echo isset($form_errors) ? set_value("username") : "" ?>" name="username" required="required">
                    </div>
                    <div class="form-group">
                        <label>Ad:</label>
                        <input type="text" value="<?php echo isset($form_errors) ? set_value("name") : "" ?>" name="name" required="required">
                    </div>
                    <div class="form-group">
                        <label>Soyad:</label>
                        <input type="text" value="<?php echo isset($form_errors) ? set_value("surname") : "" ?>" name="surname" required="required">
                    </div>
                    <div class="form-group">
                        <label>E-Posta:</label>
                        <input type="email" value="<?php echo isset($form_errors) ? set_value("email") : "" ?>" name="email" required="required">
                    </div>
                    <div class="form-group">
                        <label>Şifre:</label>
                        <input type="password" name="password" required="required">
                    </div>
                    <div class="form-group">
                        <label>Şifre Tekrar:</label>
                        <input type="password" name="repassword" required="required">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Beni Hatırla</label>
                    </div>
                    <button type="submit">Üye Ol</button>
                </form>
            </div>
            <div class="col-md-3"></div>
		</div>
	</div>
</div>
<!--end of blog list section-->


<?php $this->load->view('front/include/footer') ?>

