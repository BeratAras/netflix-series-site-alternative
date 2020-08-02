<body> 
<?php $user = $this->session->userdata('user'); ?>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="<?php echo base_url("public/front/") ?>images/logo1.png" alt="">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Giriş</h3>
        <form method="POST" action="<?php echo base_url('UserAuth/login') ?>">
			<div class="row">
                 <label>
                    Kullanıcı Adı:
                    <input type="text" name="username" required="required">
                </label>
			</div>
           
            <div class="row">
                <label>
                    Şifre:
                    <input type="password" name="password"   required="required">
                </label>
            </div>
            <div class="row">
            	<div class="remember">
					<div>
						<input type="checkbox" name="remember" value="Remember me"><span>Beni Hatırla</span>
					</div>
            		<a href="#">Şifreni mi Unuttun ?</a>
            	</div>
            </div>
           <div class="row">
           	 <button type="submit">Giriş Yap</button>
           </div>
        </form>
        <div class="row">
        	<p>Veya</p>
            <div class="social-btn-2">
            	<a class="fb" href="<?php echo $url; ?>"><i class="ion-social-facebook"></i>Facebook</a>
            	<a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
            </div>
        </div>
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper" id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Kayıt</h3>
        <form method="post" action="<?php echo base_url('UserAuth/register') ?>">
            <div class="row">
                 <label>
                    Kullanıcı Adı:
                    <input type="text" name="username" required="required">
                </label>
			</div>
			<div class="row">
                 <label>
                    Ad:
                    <input type="text" name="name" required="required">
                </label>
			</div>
			<div class="row">
                 <label>
                    Soyad:
                    <input type="text" name="surname"  required="required">
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    E-Posta:
                    <input type="email" name="email" required="required">
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Şifre:
                    <input type="password" name="password"   required="required">
                </label>
            </div>
             <div class="row">
                <label>
                    Şifre Tekrar:
                    <input type="password" name="repassword"  required="required">
                </label>
            </div>
           <div class="row">
             <button type="submit">Kayıt Ol</button>
           </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <a href="<?php echo base_url('/') ?>"><img class="logo" src="<?php echo base_url("public/front/") ?>images\logo1.png" alt=""></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a href="<?php echo base_url('/') ?>" class="btn btn-default dropdown-toggle lv1">
							Anasayfa</i>
							</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Diziler</i>
							</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Filmler</i>
							</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							En İyiler</i>
							</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Listem </i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">             
						<li><a href="#">İletişim</a></li>
						<?php if(!$this->session->userdata('status')){ ?>
							<li class="loginLink"><a href="#">Giriş</a></li>
							<li class="btn signupLink"><a href="#">Kayıt</a></li>
						<?php }else{ ?>
							<div class="user-img-nav">
								<a href="#"><img src="<?php echo base_url('public/front/images/uploads/user/').$user[0]->user_img ?>" width="50" height="50" alt=""><br></a>
							</div>
							<li class="dropdown first">
								<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
								<?php echo $user[0]->user_username ?> <i class="fa fa-angle-down" aria-hidden="true"></i>
								</a>
								<ul class="dropdown-menu level1">
									<li><a href="<?php echo base_url('/profile') ?>">Profil</a></li>
									<li class="it-last"><a href="<?php echo base_url('UserAuth/logout') ?>">Çıkış</a></li>
								</ul>
							</li> 
						<?php } ?>
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    
	    <!-- top search form -->
	    <div class="top-search">
			<input type="text" placeholder="İçerik, kişi, tür" id="character">
		
		</div>
		<div class="search">
		<div id="contents" class="searchBox"></div>
		</div>
	</div>
</header>
<!-- END | Header -->