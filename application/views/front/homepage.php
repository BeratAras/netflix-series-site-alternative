<?php $this->load->view('front/include/head') ?>
<?php $this->load->view('front/include/navbar') ?>

<div class="slider sliderv2">
	<div class="container">
		<div class="row">
	    	<div class="slider-single-item">
				<br>
				<?php foreach($banners as $banner){ ?>
	    		<div class="movie-item">
	    			<div class="row">
	    				<div class="col-md-8 col-sm-12 col-xs-12">
	    					<div class="title-in">
			    				<div class="cate">
									<?php $keyowrds = explode(',', $banner->content_keywords) ?>
									<?php foreach($keyowrds as $key => $value){ ?>
			    					<span class="blue"><a href="#"><?php echo $value ?></a></span>
									<?php } ?>
			    				</div>
			    				<h1>
								<a href="<?php echo base_url("watch/$banner->content_url"); ?>">
								<?php echo $banner->content_name ?> <span><?php $date = explode("-",$banner->content_create_date); echo $date[2]; ?></span>
								</a>
								</h1>
								<div class="social-btn">
									<a href="#" class="parent-btn"><i class="ion-play"></i> Fragmanı İzle</a>
									<!-- <a href="#" class="parent-btn"><i class="ion-heart"></i> Listeme Ekle</a> -->
									<div class="hover-bnt">
										<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>Paylaş</a>
										<div class="hvr-item">
											<a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
											<a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
											<a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
											<a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
										</div>
									</div>		
								</div>
			    				<div class="mv-details">
									<?php $comment = getComment($banner->content_id); $totalComment = count($comment); ?>
									<?php $totalPoint   = getPointSum($banner->content_id); ?>
									<?php $contentPoint = ceil($totalPoint / $totalComment); ?>
			    					<p><i class="ion-android-star"></i><span><?php echo $contentPoint ?></span> /10</p>
			    					<ul class="mv-infor">
			    						<li>  Yayınlanma: <?php echo $banner->content_create_date ?></li>
			    					</ul>
			    				</div>
			    				<div class="btn-transform transform-vertical">
									<div><a href="<?php echo base_url("watch/$banner->content_url") ?>" class="item item-1 redbtn">İzle</a></div>
									<div><a href="<?php echo base_url("watch/$banner->content_url") ?>" class="item item-2 redbtn hvrbtn">Git</a></div>
								</div>		
			    			</div>
	    				</div>
	    				<div class="col-md-4 col-sm-12 col-xs-12">
		    				<div class="mv-img-2">
			    				<a href="<?php echo base_url("watch/$banner->content_url") ?>">
								<img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$banner->content_out_banner") ?>" width="300" alt="<?php echo $banner->content_out_banner ?>">
								</a>
			    			</div>
		    			</div>
	    			</div>	
	    		</div>
				<?php } ?>
	    	</div>
	    </div>
	</div>
</div>
<div class="movie-items  full-width">
	<div class="row">
		<div class="col-md-12">
			<div class="title-hd">
				<h2>Diziler & Filmler</h2>
				<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
			</div>
			<div class="tabs">
			    <div class="tab-content">
			        <div id="tab1-h2" class="tab active">
			            <div class="row">
			            	<div class="slick-multiItem2">
								<?php foreach($contents as $content){ ?>
			            		<div class="movie-item">
			            			<div class="mv-img">
			            				<img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$content->content_out_banner") ?>" alt="">
			            			</div>
			            			<div class="hvr-inner">
			            				<a href="<?php echo base_url("watch/$content->content_url") ?>"> İzle <i class="ion-android-arrow-dropright"></i> </a>
			            			</div>
			            			<div class="title-in">
			            				<h6><a href="#"><?php echo $content->content_name ?></a></h6>
										<?php $comment = getComment($content->content_id); $totalComment = count($comment); ?>
										<?php $totalPoint   = getPointSum($content->content_id); ?>
										<?php $contentPoint = ceil($totalPoint / $totalComment); ?>
			            				<p><i class="ion-android-star"></i><span><?php echo $contentPoint ?></span> /10</p>
			            			</div>
			            		</div>
								<?php } ?>
			            	</div>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="title-hd">
				<h2>Diziler</h2>
				<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
			</div>
			<div class="tabs">
			    <div class="tab-content">
			        <div id="tab21-h2" class="tab active">
			            <div class="row">
			            	<div class="slick-multiItem2">
								<?php foreach($seriesContents as $sc){ ?>
			            		<div class="movie-item">
			            			<div class="mv-img">
										<img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$sc->content_out_banner") ?>" alt="">
			            			</div>
			            			<div class="hvr-inner">
			            				<a href="moviesingle.html"> İzle <i class="ion-android-arrow-dropright"></i> </a>
			            			</div>
			            			<div class="title-in">
			            				<h6><a href="#"><?php echo $sc->content_name ?></a></h6>
			            				<?php $comment = getComment($sc->content_id); $totalComment = count($comment); ?>
										<?php $totalPoint   = getPointSum($sc->content_id); ?>
										<?php $contentPoint = ceil($totalPoint / $totalComment); ?>
			            				<p><i class="ion-android-star"></i><span><?php echo $contentPoint ?></span> /10</p>
			            			</div>
			            		</div>
								<?php } ?>
			            	</div>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="title-hd">
				<h2>Filmler</h2>
				<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
			</div>
			<div class="tabs">
			    <div class="tab-content">
			        <div id="tab21-h2" class="tab active">
			            <div class="row">
			            	<div class="slick-multiItem2">
								<?php foreach($movieContents as $mc){ ?>
			            		<div class="movie-item">
			            			<div class="mv-img">
										<img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$mc->content_out_banner") ?>" alt="">
			            			</div>
			            			<div class="hvr-inner">
			            				<a href="moviesingle.html"> İzle <i class="ion-android-arrow-dropright"></i> </a>
			            			</div>
			            			<div class="title-in">
			            				<h6><a href="#"><?php echo $mc->content_name ?></a></h6>
			            				<?php $comment = getComment($mc->content_id); $totalComment = count($comment); ?>
										<?php $totalPoint   = getPointSum($mc->content_id); ?>
										<?php $contentPoint = ceil($totalPoint / $totalComment); ?>
			            				<p><i class="ion-android-star"></i><span><?php echo $contentPoint ?></span> /10</p>
			            			</div>
			            		</div>
								<?php } ?>
			            	</div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>

<div class="trailers full-width">
		<div class="row ipad-width">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="title-hd">
					<h2>Fragmanlar</h2>
					<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="videos">
				 	<div class="slider-for-2 video-ft">
					    <?php foreach($contents as $content){ ?>
					   	<div>
							<iframe class="item-video" src="<?php echo $content->content_trailer ?>"></iframe>
					    </div>
						<?php } ?>
					</div>
					<div class="slider-nav-2 thumb-ft">
						<?php foreach($contents as $content){ ?>
						<div class="item">
							<div class="trailer-img">
								<img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$content->content_out_banner") ?>" alt="photo by Barn Images">
							</div>
							<div class="trailer-infor">
	                        	<h4 class="desc"><?php echo $content->content_name ?></h4>
	                        	<p>2:30</p>
	                        </div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="celebrities">
						<h4 class="sb-title">En İyiler</h4>
						<div class="celeb-item">
							<a href="#"><img src="<?php echo base_url('public/front/') ?>images\uploads\ava1.jpg" alt=""></a>
							<div class="celeb-author">
								<h6><a href="#">Samuel N. Jack</a></h6>
								<span>Actor</span>
							</div>
						</div>
						<div class="celeb-item">
							<a href="#"><img src="<?php echo base_url('public/front/') ?>images\uploads\ava2.jpg" alt=""></a>
							<div class="celeb-author">
								<h6><a href="#">Benjamin Carroll</a></h6>
								<span>Actor</span>
							</div>
						</div>
						<div class="celeb-item">
							<a href="#"><img src="<?php echo base_url('public/front/') ?>images\uploads\ava3.jpg" alt=""></a>
							<div class="celeb-author">
								<h6><a href="#">Beverly Griffin</a></h6>
								<span>Actor</span>
							</div>
						</div>
						<div class="celeb-item">
							<a href="#"><img src="<?php echo base_url('public/front/') ?>images\uploads\ava4.jpg" alt=""></a>
							<div class="celeb-author">
								<h6><a href="#">Justin Weaver</a></h6>
								<span>Actor</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
</div>
<!-- latest new v1 section-->
<div class="latestnew">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-12">
				<div class="ads">
					<img src="<?php echo base_url("public/front/") ?>images\uploads\ads2.png" alt="">
				</div>
				<div class="title-hd">
					<h2>Seçkin</h2>
				</div>
				<div class="tabs">
				    <div class="tab-content">
				        <div id="tab31" class="tab active">
				            <div class="row">
				            	<div class="blog-item-style-1">
				            		<img src="<?php echo $actor->actor_img ?>" alt="" style="width: 200px">
				            		<div class="blog-it-infor">
				            			<h3><a href="#"><?php echo $actor->actor_name ?></a></h3>
				            			<span class="time"><?php echo $actor->actor_birthplace ?></span>
				            			<p>
											<?php echo $actor->actor_bio ?>
										</p>
				            		</div>
				            	</div>
				            </div>
				        </div>
				    </div>
				</div>
				<div class="morenew">
					<div class="title-hd">
						<h3>Filmleri</h3>
						<a href="#" class="viewall">Tümünü Gör<i class="ion-ios-arrow-right"></i></a>
					</div>
					<div class="more-items">
						<div class="left">
							<div class="row">
								<div class="col-md-6">
									<div class="more-it">
										<h6><a href="#">Michael Shannon Frontrunner to play Cable in “Deadpool 2”</a></h6>
										<span class="time">13 hours ago</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="more-it">
										<h6><a href="#">French cannibal horror “Raw” inspires L.A. theater to hand out “Barf Bags”</a></h6>
										<span class="time">13 hours ago</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end of latest new v1 section-->

<?php $this->load->view('front/include/footer') ?>