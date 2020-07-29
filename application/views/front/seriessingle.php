<?php $this->load->view('front/include/head'); ?>
<?php $this->load->view('front/include/navbar'); ?>
<?php $user = $this->session->userdata('user'); ?>
<?php $userStatus = $this->session->userdata('status'); ?>
<div style="background: url('<?php echo base_url("public/front/images/uploads/banner/out_banner/$series->content_in_banner"); ?>'); no-repeat;"
    class="hero sr-single-hero sr-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
            </div>
        </div>
    </div>
</div>
<div class="page-single movie-single movie_single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="movie-img sticky-sb">
                    <img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$series->content_out_banner"); ?>"
                        alt="">
                    <div class="movie-btn">
                        <div class="btn-transform transform-vertical red">
                            <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> İzlemeye Başla</a>
                            </div>
                            <div><a href="https://www.youtube.com/embed/o-0hcF97wy0"
                                    class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a>
                            </div>
                        </div>
                        <div class="btn-transform transform-vertical">
                            <div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i> Fragmanı İzle</a>
                            </div>
                            <div><a href="#" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <?php echo $this->session->flashdata('List'); ?>
                <div class="movie-single-ct main-content">
                    <h1 class="bd-hd"><?php echo $series->content_name ?> <span>
                            <?php echo $series->content_create_date ?></span></h1>
                    <div class="social-btn">
                        <?php if($userStatus){ ?>
                        <?php if($listCheck == false){ ?>
                            <a href="<?php echo base_url("SmDetail/addList/$series->content_id") ?>" class="parent-btn"><i class="ion-heart" style="color: white"></i> Listeme Ekle</a>
                        <?php }else{ ?>
                            <a href="<?php echo base_url("SmDetail/deleteList/$series->content_id") ?>" class="parent-btn"><i class="ion-heart"></i> Listemden Çıkar</a>
                        <?php } ?>
                        <?php } ?>
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
                    <div class="movie-rate">
                        <div class="rate">
                            <i class="ion-android-star"></i>
                            <?php $totalComment = count($comments) ?>
                            <?php $totalPoint   = getPointCount($series->content_id); ?>
                            <?php $contentPoint = ceil($totalPoint / $totalComment); ?>
                            <p><span><?php echo $contentPoint ?></span> /10<br>
                                <span class="rv"><?php echo count($comments) ?> İnceleme</span>
                            </p>
                        </div>
                        <div class="rate-star">
                            <p>Toplam Puan: </p>
                            <?php for($i=0; $contentPoint > $i; $i++){ ?>
                            <i class="ion-ios-star"></i>
                            <?php } ?>
                            <?php for($i=10; $contentPoint < $i; $i--){ ?>
                            <i class="ion-ios-star-outline"></i>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv tabs-series">
                                <li class="active"><a href="#about">Hakkında</a></li>
                                <li><a href="#reviews"> Yorumlar</a></li>
                                <li><a href="#cast"> Oyuncular</a></li>
                                <li><a href="#media"> Medya</a></li>
                                <li><a href="#season"> Sezonlar</a></li>
                                <li><a href="#moviesrelated"> Benzer İçerik</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="about" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <p>
                                                <?php echo $series->content_description ?>
                                            </p>
                                            <div class="title-hd-sm">
                                                <h4>Şimdiki Sezon</h4>
                                                <a href="#" class="time">Tüm Sezonlar <i
                                                        class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <!-- movie cast -->
                                            <?php $lastEpisode = getLastEpisode($series->ep_content_id) ?>
                                            <div class="mvcast-item">
                                                <div class="cast-it">
                                                    <div class="cast-left series-it">
                                                        <img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$series->content_out_banner"); ?>"
                                                            width="110" alt="">
                                                        <div>
                                                            <a href="#"><?php echo $lastEpisode->ep_season ?>. Sezon</a>
                                                            <p><?php echo $lastEpisode->ep_episode ?>. Bölüm</p>
                                                            <p><?php echo $series->content_name ?>
                                                                <?php echo $lastEpisode->ep_season ?>. Sezonu
                                                                <?php echo $lastEpisode->ep_date ?> tarihinde
                                                                yayınlandı.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title-hd-sm">
                                                <h4>Medya</h4>
                                                <a href="#" class="time">5 Fotoğraf ve 20 Video <i
                                                        class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <div class="mvsingle-item ov-item">
                                                <a class="img-lightbox" data-fancybox-group="gallery"
                                                    href="images\uploads\image41.jpg"><img
                                                        src="images\uploads\image4.jpg" alt=""></a>
                                                <a class="img-lightbox" data-fancybox-group="gallery"
                                                    href="images\uploads\image51.jpg"><img
                                                        src="images\uploads\image5.jpg" alt=""></a>
                                                <a class="img-lightbox" data-fancybox-group="gallery"
                                                    href="images\uploads\image61.jpg"><img
                                                        src="images\uploads\image6.jpg" alt=""></a>
                                                <div class="vd-it">
                                                    <img class="vd-img" src="images\uploads\image7.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"
                                                        href="https://www.youtube.com/embed/o-0hcF97wy0"><img
                                                            src="images\uploads\play-vd.png" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="title-hd-sm">
                                                <h4>Oyuncular</h4>
                                                <a href="#" class="time">Full Cast & Crew <i
                                                        class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <!-- movie cast -->
                                            <div class="mvcast-item">
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                        <img src="images\uploads\cast1.jpg" alt="">
                                                        <a href="#">Robert Downey Jr.</a>
                                                    </div>
                                                    <p>... Robert Downey Jr.</p>
                                                </div>
                                            </div>
                                            <div class="title-hd-sm">
                                                <h4>En İyi Yorum</h4>
                                                <a href="#" class="time">56 Yorumun Tümünü Gör <i
                                                        class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <!-- movie user review -->
                                            <div class="mv-user-review-item">
                                                <h3>Başlık</h3>
                                                <div class="no-star">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star last"></i>
                                                </div>
                                                <p class="time">
                                                    17 December 2016 by <a href="#"> hawaiipierson</a>
                                                </p>
                                                <p>This is by far one of my favorite movies from the MCU. The
                                                    introduction of new Characters both good and bad also makes the
                                                    movie more exciting. giving the characters more of a back story can
                                                    also help audiences relate more to different characters better, and
                                                    it connects a bond between the audience and actors or characters.
                                                    Having seen the movie three times does not bother me here as it is
                                                    as thrilling and exciting every time I am watching it. In other
                                                    words, the movie is by far better than previous movies (and I do
                                                    love everything Marvel), the plotting is splendid (they really do
                                                    out do themselves in each film, there are no problems watching it
                                                    more than once.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <div class="sb-it">
                                                <h6>Yönetmen: </h6>
                                                <p><a href="#"><?php echo $series->content_director ?></a></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Writer: </h6>
                                                <p><a href="#"><?php echo $series->content_writer ?></a></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Stars: </h6>
                                                <p><a href="#">jim Carrey, Robert J.</a>
                                                </p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Tür:</h6>
                                                <p><a href="#"><?php echo $series->content_kind ?></a></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Yayınlanma Tarihi:</h6>
                                                <p><?php echo $series->content_create_date ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Run Time:</h6>
                                                <p>22 min</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Plot Keywords:</h6>
                                                <p class="tags">
                                                    <?php $keyowrds = explode(', ', $series->content_keywords) ?>
                                                    <?php foreach ($keyowrds as $key => $value) { ?>
                                                    <span class="time"><a href="#"><?php echo $value ?></a></span>
                                                    <?php } ?>
                                                </p>
                                            </div>
                                            <div class="ads">
                                                <img src="images\uploads\ads1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"> İnceleme Yaz</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('SmDetail/createComment') ?>"
                                                    method="POST">
                                                    <div class="form-group">
                                                        <label>Puan</label>
                                                        <select name="point" class="form-control">
                                                            <?php for ($i=1; $i <= 10; $i++){ ?>
                                                            <option> <?php echo $i ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Başlık</label>
                                                        <input type="text" name="title" class="form-control">
                                                        <?php if($userStatus){ ?>
                                                        <input type="hidden" name="userID"
                                                            value="<?php echo $user[0]->user_id ?>">
                                                        <input type="hidden" name="contentID"
                                                            value="<?php echo $series->content_id ?>">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>İnceleme</label>
                                                        <textarea name="description" class="form-control" rows="25"
                                                            placeholder="Düşüncelerin Neler?"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="float: right;">Gönder</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" style="float: left;">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal End -->
                                <div id="reviews" class="tab review">
                                    <?php echo $this->session->flashdata('Comment'); ?>
                                    <div class="row">
                                        <div class="rv-hd">
                                            <div class="div">
                                                <h2><?php echo $series->content_name ?></h2>
                                                <h3>Hakkındaki Yorumlar</h3>
                                            </div>
                                            <?php if($userStatus){ ?>
                                            <a href="#" class="redbtn" data-toggle="modal"
                                                data-target="#exampleModalCenter">İnceleme Yaz</a>
                                            <?php }else{ ?>
                                            <a href="<?php echo base_url("UserAuth/login"); ?>"
                                                class="redbtn loginLink">İnceleme Yaz</a>
                                            <?php } ?>
                                        </div>
                                        <div class="topbar-filter">
                                            <p>Toplam <span><?php echo count($comments) ?> inceleme</span> bulundu.</p>
                                            <label>Filter by:</label>
                                            <select>
                                                <option value="range">-- Tarihe Göre (Eski) --
                                                <option value="saab">-- Tarihe Göre (Yeni) --
                                                <option value="saab">-- Puana Göre (Yüksek) --
                                                <option value="saab">-- Puana Göre (Düşük) --
                                            </select>
                                        </div>
                                        <?php foreach($comments as $comment){ ?>
                                        <?php $userComment = getUserComment($comment->comment_user_id) ?>
                                        <div class="mv-user-review-item">
                                            <div class="user-infor">
                                                <img src="<?php echo base_url("public/front/images/uploads/user/$userComment->user_img") ?>"
                                                    alt="">
                                                <div>
                                                    <h3><?php echo $comment->comment_title ?></h3>
                                                    <div class="no-star">
                                                        <?php for($i=0; $comment->comment_point > $i; $i++){ ?>
                                                        <i class="ion-android-star"></i>
                                                        <?php } ?>
                                                        <?php for($i=10; $comment->comment_point < $i; $i--){ ?>
                                                        <i class="ion-android-star last"></i>
                                                        <?php } ?>
                                                    </div>
                                                    <p class="time">
                                                        <?php echo $comment->comment_create_date ?> <a href="#">
                                                            <?php echo $userComment->user_username ?></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <p>
                                                <?php echo $comment->comment_description ?>
                                            </p>
                                        </div>
                                        <?php } ?>
                                        <div class="topbar-filter">
                                            <label>Reviews per page:</label>
                                            <select>
                                                <option value="range">5 Reviews
                                                <option value="saab">10 Reviews
                                            </select>
                                            <div class="pagination2">
                                                <span>Page 1 of 6:</span>
                                                <?php echo $links ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="cast" class="tab">
                                    <div class="row">
                                        <h3>Cast & Crew of</h3>
                                        <h2>Avengers: Age of Ultron</h2>
                                        <!-- //== -->
                                        <div class="title-hd-sm">
                                            <h4>Directors & Credit Writers</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JW</h4>
                                                    <a href="#">Joss Whedon</a>
                                                </div>
                                                <p>... Director</p>
                                            </div>
                                        </div>
                                        <!-- //== -->
                                        <div class="title-hd-sm">
                                            <h4>Directors & Credit Writers</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>SL</h4>
                                                    <a href="#">Stan Lee</a>
                                                </div>
                                                <p>... (based on Marvel comics)</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JK</h4>
                                                    <a href="#">Jack Kirby</a>
                                                </div>
                                                <p>... (based on Marvel comics)</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JS</h4>
                                                    <a href="#">Joe Simon</a>
                                                </div>
                                                <p>... (character created by: Captain America)</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JS</h4>
                                                    <a href="#">Joe Simon</a>
                                                </div>
                                                <p>... (character created by: Thanos)</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>RT</h4>
                                                    <a href="#">Roy Thomas</a>
                                                </div>
                                                <p>... (character created by: Ultron, Vision)</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JB</h4>
                                                    <a href="#">John Buscema</a>
                                                </div>
                                                <p>... (character created by: Ultron, Vision)</p>
                                            </div>
                                        </div>
                                        <!-- //== -->
                                        <div class="title-hd-sm">
                                            <h4>Cast</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="images\uploads\cast1.jpg" alt="">
                                                    <a href="#">Robert Downey Jr.</a>
                                                </div>
                                                <p>... Robert Downey Jr.</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="images\uploads\cast2.jpg" alt="">
                                                    <a href="#">Chris Hemsworth</a>
                                                </div>
                                                <p>... Thor</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="images\uploads\cast3.jpg" alt="">
                                                    <a href="#">Mark Ruffalo</a>
                                                </div>
                                                <p>... Bruce Banner/ Hulk</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="images\uploads\cast4.jpg" alt="">
                                                    <a href="#">Chris Evans</a>
                                                </div>
                                                <p>... Steve Rogers/ Captain America</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="images\uploads\cast5.jpg" alt="">
                                                    <a href="#">Scarlett Johansson</a>
                                                </div>
                                                <p>... Natasha Romanoff/ Black Widow</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="images\uploads\cast6.jpg" alt="">
                                                    <a href="#">Jeremy Renner</a>
                                                </div>
                                                <p>... Clint Barton/ Hawkeye</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="images\uploads\cast7.jpg" alt="">
                                                    <a href="#">James Spader</a>
                                                </div>
                                                <p>... Ultron</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="images\uploads\cast9.jpg" alt="">
                                                    <a href="#">Don Cheadle</a>
                                                </div>
                                                <p>... James Rhodes/ War Machine</p>
                                            </div>
                                        </div>
                                        <!-- //== -->
                                        <div class="title-hd-sm">
                                            <h4>Produced by</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>VA</h4>
                                                    <a href="#">Victoria Alonso</a>
                                                </div>
                                                <p>... executive producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>MB</h4>
                                                    <a href="#">Mitchel Bell</a>
                                                </div>
                                                <p>... co-producer (as Mitch Bell)</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JC</h4>
                                                    <a href="#">Jamie Christopher</a>
                                                </div>
                                                <p>... associate producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>LD</h4>
                                                    <a href="#">Louis D’Esposito</a>
                                                </div>
                                                <p>... executive producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JF</h4>
                                                    <a href="#">Jon Favreau</a>
                                                </div>
                                                <p>... executive producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>KF</h4>
                                                    <a href="#">Kevin Feige</a>
                                                </div>
                                                <p>... producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>AF</h4>
                                                    <a href="#">Alan Fine</a>
                                                </div>
                                                <p>... executive producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JF</h4>
                                                    <a href="#">Jeffrey Ford</a>
                                                </div>
                                                <p>... associate producer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="media" class="tab">
                                    <div class="row">
                                        <div class="rv-hd">
                                            <div>
                                                <h3>Videos & Photos of</h3>
                                                <h2>The Big Bang Theory</h2>
                                            </div>
                                        </div>
                                        <div class="title-hd-sm">
                                            <h4>Videos <span>(8)</span></h4>
                                        </div>
                                        <div class="mvsingle-item media-item">
                                            <div class="vd-item">
                                                <div class="vd-it">
                                                    <img class="vd-img" src="images\uploads\vd-item1.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"
                                                        href="https://www.youtube.com/embed/o-0hcF97wy0"><img
                                                            src="images\uploads\play-vd.png" alt=""></a>
                                                </div>
                                                <div class="vd-infor">
                                                    <h6> <a href="#">Trailer: Watch New Scenes</a></h6>
                                                    <p class="time"> 1: 31</p>
                                                </div>
                                            </div>
                                            <div class="vd-item">
                                                <div class="vd-it">
                                                    <img class="vd-img" src="images\uploads\vd-item2.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"
                                                        href="https://www.youtube.com/embed/o-0hcF97wy0"><img
                                                            src="images\uploads\play-vd.png" alt=""></a>
                                                </div>
                                                <div class="vd-infor">
                                                    <h6> <a href="#">Featurette: “Avengers Re-Assembled</a></h6>
                                                    <p class="time"> 1: 03</p>
                                                </div>
                                            </div>
                                            <div class="vd-item">
                                                <div class="vd-it">
                                                    <img class="vd-img" src="images\uploads\vd-item3.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"
                                                        href="https://www.youtube.com/embed/o-0hcF97wy0"><img
                                                            src="images\uploads\play-vd.png" alt=""></a>
                                                </div>
                                                <div class="vd-infor">
                                                    <h6> <a href="#">Interview: Robert Downey Jr</a></h6>
                                                    <p class="time"> 3:27</p>
                                                </div>
                                            </div>
                                            <div class="vd-item">
                                                <div class="vd-it">
                                                    <img class="vd-img" src="images\uploads\vd-item4.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"
                                                        href="https://www.youtube.com/embed/o-0hcF97wy0"><img
                                                            src="images\uploads\play-vd.png" alt=""></a>
                                                </div>
                                                <div class="vd-infor">
                                                    <h6> <a href="#">Interview: Scarlett Johansson</a></h6>
                                                    <p class="time"> 3:27</p>
                                                </div>
                                            </div>
                                            <div class="vd-item">
                                                <div class="vd-it">
                                                    <img class="vd-img" src="images\uploads\vd-item1.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"
                                                        href="https://www.youtube.com/embed/o-0hcF97wy0"><img
                                                            src="images\uploads\play-vd.png" alt=""></a>
                                                </div>
                                                <div class="vd-infor">
                                                    <h6> <a href="#">Featurette: Meet Quicksilver & The Scarlet
                                                            Witch</a></h6>
                                                    <p class="time"> 1: 31</p>
                                                </div>
                                            </div>
                                            <div class="vd-item">
                                                <div class="vd-it">
                                                    <img class="vd-img" src="images\uploads\vd-item2.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"
                                                        href="https://www.youtube.com/embed/o-0hcF97wy0"><img
                                                            src="images\uploads\play-vd.png" alt=""></a>
                                                </div>
                                                <div class="vd-infor">
                                                    <h6> <a href="#">Interview: Director Joss Whedon</a></h6>
                                                    <p class="time"> 1: 03</p>
                                                </div>
                                            </div>
                                            <div class="vd-item">
                                                <div class="vd-it">
                                                    <img class="vd-img" src="images\uploads\vd-item3.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"
                                                        href="https://www.youtube.com/embed/o-0hcF97wy0"><img
                                                            src="images\uploads\play-vd.png" alt=""></a>
                                                </div>
                                                <div class="vd-infor">
                                                    <h6> <a href="#">Interview: Mark Ruffalo</a></h6>
                                                    <p class="time"> 3:27</p>
                                                </div>
                                            </div>
                                            <div class="vd-item">
                                                <div class="vd-it">
                                                    <img class="vd-img" src="images\uploads\vd-item4.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"
                                                        href="https://www.youtube.com/embed/o-0hcF97wy0"><img
                                                            src="images\uploads\play-vd.png" alt=""></a>
                                                </div>
                                                <div class="vd-infor">
                                                    <h6> <a href="#">Official Trailer #2</a></h6>
                                                    <p class="time"> 3:27</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title-hd-sm">
                                            <h4>Photos <span> (21)</span></h4>
                                        </div>
                                        <div class="mvsingle-item">
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image11.jpg"><img src="images\uploads\image1.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image21.jpg"><img src="images\uploads\image2.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image31.jpg"><img src="images\uploads\image3.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image41.jpg"><img src="images\uploads\image4.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image51.jpg"><img src="images\uploads\image5.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image61.jpg"><img src="images\uploads\image6.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image71.jpg"><img src="images\uploads\image7.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image81.jpg"><img src="images\uploads\image8.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image91.jpg"><img src="images\uploads\image9.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image101.jpg"><img src="images\uploads\image10.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image111.jpg"><img
                                                    src="images\uploads\image1-1.jpg" alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image121.jpg"><img src="images\uploads\image12.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image131.jpg"><img src="images\uploads\image13.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image141.jpg"><img src="images\uploads\image14.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image151.jpg"><img src="images\uploads\image15.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image161.jpg"><img src="images\uploads\image16.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image171.jpg"><img src="images\uploads\image17.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image181.jpg"><img src="images\uploads\image18.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image191.jpg"><img src="images\uploads\image19.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image201.jpg"><img src="images\uploads\image20.jpg"
                                                    alt=""></a>
                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                href="images\uploads\image211.jpg"><img
                                                    src="images\uploads\image2-1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="season" class="tab">
                                    <div class="row">
                                        <?php $allEpisode = getAllEpisode($series->ep_content_id) ?>
                                        <?php foreach($allEpisode as $allEpisode){ ?>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left series-it">
                                                    <img src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$series->content_out_banner") ?>"
                                                        width="80" alt="">
                                                    <div>
                                                        <a href=""><?php echo $allEpisode->ep_season ?>. Sezon</a>
                                                        <p><?php echo $series->content_name ?>
                                                            <?php echo $allEpisode->ep_season ?>. Sezonu
                                                            <?php echo $allEpisode->ep_date ?> tarihinde yayınlandı.</p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <?php $episode = getEpisode($allEpisode->ep_season, $allEpisode->ep_content_id) ?>
                                            <div class="mvcast-item JustifyCenter">
                                                <div class="cast-it">
                                                    <div class="series-it">
                                                        <?php foreach($episode as $episode){ ?>  <br>
                                                            <img style="margin-bottom: 20px" src="<?php echo base_url("public/front/images/uploads/banner/out_banner/$series->content_out_banner") ?>"
                                                            width="50" alt="">
                                                            <a href="<?php echo base_url("watch/$series->content_url/$episode->ep_url") ?>"><?php echo $episode->ep_episode ?>. Bölüm</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div id="moviesrelated" class="tab">
                                    <div class="row">
                                        <h2>Skyfall: Quantum of Spectre</h2>
                                        <h3>Related Movies To</h3>
                                        <div class="topbar-filter">
                                            <p>Found <span>12 movies</span> in total</p>
                                            <label>Sort by:</label>
                                            <select>
                                                <option value="popularity">Popularity Descending
                                                <option value="popularity">Popularity Ascending
                                                <option value="rating">Rating Descending
                                                <option value="rating">Rating Ascending
                                                <option value="date">Release date Descending
                                                <option value="date">Release date Ascending
                                            </select>
                                        </div>
                                        <div class="movie-item-style-2">
                                            <img src="images\uploads\mv1.jpg" alt="">
                                            <div class="mv-item-infor">
                                                <h6><a href="#">oblivion <span>(2012)</span></a></h6>
                                                <p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
                                                <p class="describe">Earth's mightiest heroes must come together and
                                                    learn to fight as a team if they are to stop the mischievous Loki
                                                    and his alien army from enslaving humanity...</p>
                                                <p class="run-time"> Run Time: 2h21’ . <span>MMPA: PG-13 </span> .
                                                    <span>Release: 1 May 2015</span></p>
                                                <p>Director: <a href="#">Joss Whedon</a></p>
                                                <p>Stars: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris
                                                        Evans,</a> <a href="#"> Chris Hemsworth</a></p>
                                            </div>
                                        </div>
                                        <div class="movie-item-style-2">
                                            <img src="images\uploads\mv2.jpg" alt="">
                                            <div class="mv-item-infor">
                                                <h6><a href="#">into the wild <span>(2014)</span></a></h6>
                                                <p class="rate"><i class="ion-android-star"></i><span>7.8</span> /10</p>
                                                <p class="describe">As Steve Rogers struggles to embrace his role in the
                                                    modern world, he teams up with a fellow Avenger and S.H.I.E.L.D
                                                    agent, Black Widow, to battle a new threat...</p>
                                                <p class="run-time"> Run Time: 2h21’ . <span>MMPA: PG-13 </span> .
                                                    <span>Release: 1 May 2015</span></p>
                                                <p>Director: <a href="#">Anthony Russo,</a><a href="#">Joe Russo</a></p>
                                                <p>Stars: <a href="#">Chris Evans,</a> <a href="#">Samuel L.
                                                        Jackson,</a> <a href="#"> Scarlett Johansson</a></p>
                                            </div>
                                        </div>
                                        <div class="movie-item-style-2">
                                            <img src="images\uploads\mv3.jpg" alt="">
                                            <div class="mv-item-infor">
                                                <h6><a href="#">blade runner <span>(2015)</span></a></h6>
                                                <p class="rate"><i class="ion-android-star"></i><span>7.3</span> /10</p>
                                                <p class="describe">Armed with a super-suit with the astonishing ability
                                                    to shrink in scale but increase in strength, cat burglar Scott Lang
                                                    must embrace his inner hero and help...</p>
                                                <p class="run-time"> Run Time: 2h21’ . <span>MMPA: PG-13 </span> .
                                                    <span>Release: 1 May 2015</span></p>
                                                <p>Director: <a href="#">Peyton Reed</a></p>
                                                <p>Stars: <a href="#">Paul Rudd,</a> <a href="#"> Michael Douglas</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="movie-item-style-2">
                                            <img src="images\uploads\mv4.jpg" alt="">
                                            <div class="mv-item-infor">
                                                <h6><a href="#">Mulholland pride<span> (2013) </span></a></h6>
                                                <p class="rate"><i class="ion-android-star"></i><span>7.2</span> /10</p>
                                                <p class="describe">When Tony Stark's world is torn apart by a
                                                    formidable terrorist called the Mandarin, he starts an odyssey of
                                                    rebuilding and retribution.</p>
                                                <p class="run-time"> Run Time: 2h21’ . <span>MMPA: PG-13 </span> .
                                                    <span>Release: 1 May 2015</span></p>
                                                <p>Director: <a href="#">Shane Black</a></p>
                                                <p>Stars: <a href="#">Robert Downey Jr., </a> <a href="#"> Guy
                                                        Pearce,</a><a href="#">Don Cheadle</a></p>
                                            </div>
                                        </div>
                                        <div class="movie-item-style-2">
                                            <img src="images\uploads\mv5.jpg" alt="">
                                            <div class="mv-item-infor">
                                                <h6><a href="#">skyfall: evil of boss<span> (2013) </span></a></h6>
                                                <p class="rate"><i class="ion-android-star"></i><span>7.0</span> /10</p>
                                                <p class="describe">When Tony Stark's world is torn apart by a
                                                    formidable terrorist called the Mandarin, he starts an odyssey of
                                                    rebuilding and retribution.</p>
                                                <p class="run-time"> Run Time: 2h21’ . <span>MMPA: PG-13 </span> .
                                                    <span>Release: 1 May 2015</span></p>
                                                <p>Director: <a href="#">Alan Taylor</a></p>
                                                <p>Stars: <a href="#">Chris Hemsworth, </a> <a href="#"> Natalie
                                                        Portman,</a><a href="#">Tom Hiddleston</a></p>
                                            </div>
                                        </div>
                                        <div class="topbar-filter">
                                            <label>Movies per page:</label>
                                            <select>
                                                <option value="range">5 Movies
                                                <option value="saab">10 Movies
                                            </select>
                                            <div class="pagination2">
                                                <span>Page 1 of 2:</span>
                                                <a class="active" href="#">1</a>
                                                <a href="#">2</a>
                                                <a href="#"><i class="ion-arrow-right-b"></i></a>
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
    </div>
</div>

<?php $this->load->view('front/include/footer') ?>

<script>
$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})
</script>