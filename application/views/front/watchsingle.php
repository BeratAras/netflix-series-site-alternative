<?php error_reporting(0); ?>
<?php $this->load->view('front/include/head') ?>
<?php $this->load->view('front/include/navbar') ?>
<?php $user = $this->session->userdata('user'); ?>
<?php $userStatus = $this->session->userdata('status'); ?>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog detail section-->
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="blog-detail-ct">
                    <h2>
                        <img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$watchDetail->content_out_banner"); ?>" width="50" alt="">
                        <?php echo $watchDetail->content_name ?> - <?php echo $watchDetail->ep_season ?>.Sezon <?php echo $watchDetail->ep_episode ?>.Bölüm "<?php echo $watchDetail->ep_name ?>"
                    </h2>    
                    <div>
                        <?php echo $watchDetail->ep_frame ?>
                    </div> <br>
					<p class="series-des">
                        <?php echo $watchDetail->ep_description ?>
                    </p>
                    <span class="time">Bölüm Tarihi: <?php echo $watchDetail->ep_date ?></span>
				
					<!-- share link -->
					<div class="flex-it share-tag">
						<div class="social-link">
							<h4>Bizi Takip Et</h4>
							<a href="#"><i class="ion-social-facebook"></i></a>
							<a href="#"><i class="ion-social-twitter"></i></a>
							<a href="#"><i class="ion-social-googleplus"></i></a>
							<a href="#"><i class="ion-social-pinterest"></i></a>
							<a href="#"><i class="ion-social-linkedin"></i></a>
						</div>
						<div class="right-it">
                            <h4>Tür</h4>
                            <?php $keyowrds = explode(',', $watchDetail->content_keywords) ?>
                            <?php foreach($keyowrds as $key => $value){ ?>
							<a href="#"><?php echo $value ?></a> &nbsp;&nbsp;
                            <?php } ?>
						</div>
					</div>
					<!-- comment items -->
					<div class="comments">
						<?php if(!$EpisodeComments){ ?>
							<h4>Herhangi bir yorum girilmemiş. İlk yorumu sen yap!</h4>
						<?php }else{ ?>
						<?php echo $this->session->flashdata('EpisodeComment') ?>
                        <h4><?php echo count($EpisodeComments) ?> Yorum</h4>
                        <?php foreach($EpisodeComments as $comment){ ?>
                        <?php $userComment = getUserComment($comment->ec_user_id) ?>
						<div class="cmt-item flex-it">
							<img src="<?php echo base_url("public/front/images/uploads/user/$userComment->user_img") ?>" alt="" width="50">
							<div class="author-infor">
								<div class="flex-it2">
									<h6><a href="#"><?php echo $userComment->user_username ?></a></h6> <span class="time"> - <?php echo $comment->ec_create_date ?></span>
								</div>
								<p>
                                    <?php echo $comment->ec_description ?>
                                </p>
							</div>
                        </div>
                        <?php } } ?>
					</div>
					<?php if($userStatus){ ?>
					<div class="comment-form">
						<h4><?php echo $user[0]->user_name ?>, Düşüncelerini Paylaşır mısın?</h4>
						<form method="POST" action="<?php echo base_url('SmDetail/createEpisodeComment') ?>">
							<div class="row">
								<div class="col-md-4">
                                    <?php if($userStatus){ ?>
                                        <input type="hidden" name="userID"
                                            value="<?php echo $user[0]->user_id ?>">
                                        <input type="hidden" name="contentID"
                                            value="<?php echo $watchDetail->content_id ?>">
											<input type="hidden" name="episodeID"
                                            value="<?php echo $watchDetail->ep_id ?>">
                                        <?php } ?>
                                    </div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<textarea name="description" id="" placeholder="<?php echo $user[0]->user_name ?>, Düşüncelerin Neler?"></textarea>
                                </div>
                            </div>
							<input class="submit" type="submit" placeholder="submit">
						</form>
					</div>
					<!-- comment form -->
					<?php }else{ ?>
						<div class="register-form">
							<br> 
							<button class="redbtn loginLink" type="submit">Yorum Yapmak İçin Giriş Yap</button>				
						</div><br><br>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="episode-vote sb-it">
						<h4 class="sb-title">Bölüm Nasıldı?</h4>
						<div class="row">
							<div class="col-md-6">
								<li><i class="fa fa-thumbs-o-up fa-3x"></i><br><label class="like">5</label></li>
							</div>
							<div class="col-md-6">
								<li><i class="fa fa-thumbs-o-down fa-3x"></i><br><label class="diss">5</label></li>
							</div>
						</div>
					</div>
					
					<div class="sb-recentpost sb-it">
						<h4 class="sb-title"><?php echo $watchDetail->ep_season ?>. Sezonun Bölümleri</h4>
						<?php $allEpisode = getEpisode($watchDetail->ep_season, $watchDetail->content_id);  ?>
						<?php foreach($allEpisode as $allEpisode){ ?>
						<div class="recent-item">
							<span><?php echo $allEpisode->ep_episode ?> - </span>
							<h6><a href="<?php echo base_url("watch/$watchDetail->content_url/$allEpisode->ep_url") ?>"><?php echo $allEpisode->ep_name ?></a></h6>
						</div>
						<?php } ?>
					</div>
					<div class="ads">
						<img src="images\uploads\ads1.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('front/include/footer') ?>