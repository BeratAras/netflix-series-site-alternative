<?php $user = $this->session->userdata('user'); ?>
<?php if($this->session->userdata('status')){ ?>
<?php $this->load->view('front/include/head') ?>
<?php $this->load->view('front/include/navbar') ?>
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-11">
				<div class="hero-ct">
					<h1><?php echo $users[0]->user_name. ' ' .$users[0]->user_surname. ' (' .$user[0]->user_username. ')' ?></h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Profile</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-fav">
                        <div class="user-img">
                            <a href="#"><img src="<?php echo base_url('public/front/images/uploads/user/').$users[0]->user_img ?>" alt=""><br></a>
                        </div>
                        <p>Profil Ayarları</p>
						<ul>
							<li class="active"><a href="userprofile.html">Profile</a></li>
							<li><a href="userfavoritelist.html">Listem</a></li>
							<li><a href="userrate.html">Düşüncelerim</a></li>
						</ul>
					</div>
					<div class="user-fav">
						<p>Diğer Ayarlar</p>
						<ul>
							<li><a href="#">Şifremi Değiştir</a></li>
							<li><a href="#">Çıkış Yap</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="">
                    <form method="POST" action="<?php echo base_url('Homepage/profilPhotoUpload') ?>" class="user" enctype='multipart/form-data'>
                        <?php echo $this->session->flashdata('Info'); ?>
                        <h4>Profil Bilgileri</h4>
                        <div class="row">
                            <div class="col-6 form-it">
								<label>Profil Fotoğrafı</label>
								<input type="file" class="redbtn" name="user_img" value="<?php echo $users[0]->user_img ?>">
							</div>
                       
                            <div class="col-6 form-it">
                                <input type="submit" name="ppSubmit" class="redbtn" value="Fotoğrafı Güncelle">
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="<?php echo base_url('Homepage/profileUpdate') ?>" class="user" enctype='multipart/form-data'>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Kullanıcı Adı</label>
								<input type="text" name="username" value="<?php echo $users[0]->user_username ?>">
							</div>
							<div class="col-md-6 form-it">
								<label>E-Posta Adresi</label>
								<input type="email" name="email" value="<?php echo $users[0]->user_email ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Ad</label>
								<input type="text" name="name" value="<?php echo $users[0]->user_name ?>">
							</div>
							<div class="col-md-6 form-it">
								<label>Soyad</label>
								<input type="text" name="surname" value="<?php echo $users[0]->user_surname ?>">
							</div>
                        </div>
                        <div class="row">
							<div class="col-md-6 form-it">
								<label>Twitter</label>
								<input type="text" name="twitter" value="<?php echo $users[0]->user_twitter ?>">
							</div>
							<div class="col-md-6 form-it">
								<label>Instagram</label>
								<input type="text" name="instagram" value="<?php echo $users[0]->user_instagram ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Ülke</label>
								<select name="country">
								  <option value="united">United States
								  <option value="saab">Others
								</select>
							</div>
							<div class="col-md-6 form-it">
								<label>Şehir</label>
								<select name="state">
								  <option value="united">New York
								  <option value="saab">Others
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="Kaydet">
							</div>
						</div>	
					</form>
					<form method="POST" action="<?php echo base_url('Homepage/passwordUpdate') ?>" class="password" enctype='multipart/form-data'>
						<h4>Şifreni Değiştir</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Eski Şifren</label>
								<input type="password" name="oldpassword" placeholder="Eski">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Yeni Şifren</label>
								<input type="password" name="password" placeholder="Yeni">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Yeni Şifreni Doğrula</label>
								<input type="password" name="repassword" placeholder="Yeni Tekrar">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="Değiştir">
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
}else{
    redirect('/');
}
?>
<?php $this->load->view('front/include/footer') ?>