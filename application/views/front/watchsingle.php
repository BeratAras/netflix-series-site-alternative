
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
                    <h1>
                        <img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$watchDetail->content_out_banner"); ?>" width="50" alt="">
                        <?php echo $watchDetail->content_name ?> - <?php echo $watchDetail->ep_season ?>.Sezon <?php echo $watchDetail->ep_episode ?>.Bölüm "<?php echo $watchDetail->ep_name ?>"
                    </h1>    
                    <div>
                        <?php echo $watchDetail->ep_frame ?>
                    </div>
                    <span class="time"><?php echo $watchDetail->ep_date ?></span>
					<p>
                        <?php echo $watchDetail->content_description ?>
                    </p>

				
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
                        <h4><?php echo count($comments) ?> Yorum</h4>
                        <?php foreach($comments as $comment){ ?>
                        <?php $userComment = getUserComment($comment->comment_user_id) ?>
						<div class="cmt-item flex-it">
							<img src="<?php echo base_url("public/front/images/uploads/user/$userComment->user_img") ?>" alt="" width="50">
							<div class="author-infor">
								<div class="flex-it2">
									<h6><a href="#"><?php echo $userComment->user_username ?></a></h6> <span class="time"> - <?php echo $comment->comment_create_date ?></span>
								</div>
								<p>
                                    <?php echo $comment->comment_description ?>
                                </p>
							</div>
                        </div>
                        <?php } ?>
					</div>
					<div class="comment-form">
						<h4><?php echo $userComment->user_name ?>, Düşüncelerini Paylaşır mısın?</h4>
						<form method="POST" action="<?php echo base_url('SmDetail/createComment') ?>">
							<div class="row">
								<div class="col-md-4">
                                    <input name="title" type="text" placeholder="Başlık">
                                    <?php if($userStatus){ ?>
                                        <input type="hidden" name="userID"
                                            value="<?php echo $user[0]->user_id ?>">
                                        <input type="hidden" name="contentID"
                                            value="<?php echo $watchDetail->content_id ?>">
                                        <?php } ?>
                                    </div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<textarea name="description" id="" placeholder="<?php echo $userComment->user_name ?>, Düşüncelerin Neler?"></textarea>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <h4>Puanın</h4>
                                    <select name="point">
                                        <?php for ($i=1; $i <= 10; $i++){ ?>
                                        <option> <?php echo $i ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
							<input class="submit" type="submit" placeholder="submit">
						</form>
					</div>
					<!-- comment form -->
				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="sb-search sb-it">
						<h4 class="sb-title">Search</h4>
						<input type="text" placeholder="Enter keywords">
					</div>
					<div class="sb-cate sb-it">
						<h4 class="sb-title">Categories</h4>
						<ul>
							<li><a href="#">Awards (50)</a></li>
							<li><a href="#">Box office (38)</a></li>
							<li><a href="#">Film reviews (72)</a></li>
							<li><a href="#">News (45)</a></li>
							<li><a href="#">Global (06)</a></li>
						</ul>
					</div>
					<div class="sb-recentpost sb-it">
						<h4 class="sb-title">most popular</h4>
						<div class="recent-item">
							<span>01</span><h6><a href="#">Korea Box Office: Beauty and the Beast Wins Fourth</a></h6>
						</div>
						<div class="recent-item">
							<span>02</span><h6><a href="#">Homeland Finale Includes Shocking Death </a></h6>
						</div>
						<div class="recent-item">
							<span>03</span><h6><a href="#">Fate of the Furious Reviews What the Critics Saying</a></h6>
						</div>
					</div>
					<div class="sb-tags sb-it">
						<h4 class="sb-title">tags</h4>
						<ul class="tag-items">
							<li><a href="#">Batman</a></li>
							<li><a href="#">film</a></li>
							<li><a href="#">homeland</a></li>
							<li><a href="#">Fast & Furious</a></li>
							<li><a href="#">Dead Walker</a></li>
							<li><a href="#">King</a></li>
							<li><a href="#">Beauty</a></li>
						</ul>
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