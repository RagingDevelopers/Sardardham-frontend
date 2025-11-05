<style>
  .swiper-container {
    width: 100%;
    height: 121vh;
  }

  .slide {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    text-align: center;
    font-size: 18px;
    background: #fff;
    overflow: hidden;
  }

  .slide-image {
    position: absolute;
    width: calc(100%);
    height: 100%;
    background-size: cover;
    background-repeat: no-repeat;
  }

  .slide-title {
    font-size: 4rem;
    line-height: 1;
    max-width: 50%;
    white-space: normal;
    word-break: break-word;
    color: #FFF;
    z-index: 100;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    font-weight: normal;
  }

  @media (min-width: 45em) {
    .slide-title {
      font-size: 7vw;
      max-width: none;
    }
  }

  .slide-title span {
    white-space: pre;
    display: inline-block;
    opacity: 0;
  }

  .slideshow {
    position: relative;
  }

  .slideshow-pagination {
    position: absolute;
    bottom: 5rem;
    left: 0;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    transition: .3s opacity;
    z-index: 10;
  }

  .slideshow-pagination-item {
    display: flex;
    align-items: center;
  }

  .slideshow-pagination-item .pagination-number {
    opacity: 0.5;
  }

  .slideshow-pagination-item:hover,
  .slideshow-pagination-item:focus {
    cursor: pointer;
  }

  .slideshow-pagination-item:last-of-type .pagination-separator {
    width: 0;
  }

  .slideshow-pagination-item.active .pagination-number {
    opacity: 1;
  }

  .slideshow-pagination-item.active .pagination-separator {
    width: 10vw;
  }

  .slideshow-navigation-button {
    position: absolute;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 97%;
    width: 5rem;
    z-index: 1000;
    transition: all .3s ease;
    color: #FFF;
  }

  .slideshow-navigation-button:hover,
  .slideshow-navigation-button:focus {
    cursor: pointer;
    background: rgba(0, 0, 0, 0.5);
  }

  .slideshow-navigation-button.prev {
    left: 0;
  }

  .slideshow-navigation-button.next {
    right: 0;
  }

  .pagination-number {
    font-size: 1.8rem;
    color: #FFF;
    font-family: 'Oswald', sans-serif;
    padding: 0 0.5rem;
  }

  .pagination-separator {
    display: none;
    position: relative;
    width: 40px;
    height: 2px;
    background: rgba(255, 255, 255, 0.25);
    transition: all .3s ease;
  }

  @media (min-width: 45em) {
    .pagination-separator {
      display: block;
    }
  }

  .swiper-wrapper {

    height: 97% !important;
  }

  .pagination-separator-loader {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #FFFFFF;
    transform-origin: 0 0;
  }

  .heading {
    border-radius: 35px 35px 0px 0px;
  }

  @media only screen and (max-width: 576px) {
    .swiper-container {
      width: 100%+400vh;
      height: 30vh;
    }

    .slideshow-pagination {
      display: none;
    }

    .slideshow-navigation-button.prev {
      left: 0;
      width: 40px;
    }

    .slideshow-navigation-button.next {
      right: 0;
      width: 40px;
    }

    .slide-title {
      font-size: 22px;
    }
  }

  @media only screen and (min-width: 576px) {
    .swiper-container {
      width: 100%+400vh;
      height: 55vh;
    }

    .slide-title {
      font-size: 2rem;
    }
  }

  @media only screen and (min-width:768px) {
    .swiper-container {
      width: 100%+400vh;
      height: 82vh;
    }

    .slide-title {
      font-size: 3rem;
    }
  }

  @media only screen and (min-width:992px) {
    .swiper-container {
      width: 100%+400vh;
      height: 100vh;
    }

    .slide-title {
      font-size: 4rem;
    }
  }

  .owl-item:active {
    margin-right: 0;
  }

  .owl-item {
    margin-right: 0;
  }

  .image a .events-height {
    height: 500px;
    width: 500px;
  }

  .events-title-height {
    height: 100px;
    width: auto;
  }

  @media only screen and (max-width: 600px) {
    .image a .events-height {
      height: 350px;
      width: 350px;
    }

    .events-title-height {
      height: 100px;
      width: auto;
    }

    .Statue {
      display: none;
    }

  }
</style>
<style>
  /* ===== Featured Cards ===== */
  .ux-featured-section {
    --gap: 16px;
    --card-w: 275px;
    padding: 20px 0;
  }

  .ux-slider {
    display: flex;
    justify-content: center;
  }

  .ux-slider-track {
    display: flex;
    gap: var(--gap);
    flex-wrap: wrap;
    justify-content: center;
  }

  .ux-slide {
    flex: 0 0 var(--card-w);
    display: flex;
    justify-content: center;
  }

  /* ===== Card ===== */
  .ux-card-item {
    width: 100%;
    border-radius: 16px;
    background: #fff;
    border: 2px solid #ddd;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.35s ease;
    position: relative;
    z-index: 0;
    padding: 25px;
  }

  /* image naturally responsive */
  .ux-card-item img {
    /* max-width: 80%; */
    height: auto;
    /* max-height: 160px; */
    object-fit: contain;
    display: block;
    position: relative;
    z-index: 1;
    border-radius: 16px;
    transition: transform 0.35s ease;
  }

  .ux-card-item:hover img {
    transform: scale(1.08);
  }

  /* Hover color backgrounds */
  .ux-slide:nth-child(5n+1) .ux-card-item::before {
    background: linear-gradient(135deg, #C62839, #F06292);
  }

  .ux-slide:nth-child(5n+2) .ux-card-item::before {
    background: linear-gradient(135deg, #10884A, #43A047);
  }

  .ux-slide:nth-child(5n+3) .ux-card-item::before {
    background: linear-gradient(135deg, #E79B4A, #FFD54F);
  }

  .ux-slide:nth-child(5n+4) .ux-card-item::before {
    background: linear-gradient(135deg, #0A58A6, #42A5F5);
  }

  .ux-slide:nth-child(5n+5) .ux-card-item::before {
    background: linear-gradient(135deg, #7B68A6, #B39DDB);
  }

  .ux-card-item::before {
    content: "";
    position: absolute;
    inset: 0;
    opacity: 0;
    transition: opacity 0.35s ease;
    z-index: 0;
  }

  .ux-card-item:hover::before {
    opacity: 1;
  }

  /* ===== Responsive ===== */

  /* ==== Show exactly 5 cards per row ONLY on laptop screens (992px–1199px) ==== */
  @media (min-width: 1200px) and (max-width: 1366px) {

    .ux-featured-section .ux-slider-track {
      display: flex;
      flex-wrap: nowrap !important;
      justify-content: center;
      gap: 16px;
    }

    .ux-featured-section .ux-slide {
      flex: 0 0 calc((100% - (16px * 4)) / 5);
      max-width: calc((100% - (16px * 4)) / 5);
    }

    .ux-featured-section .ux-card-item {
      width: 100%;
    }
  }


  /* Tablet (2 per row) */
  @media (max-width: 991.98px) {
    /* .ux-slide {
      flex: 0 0 calc(50% - var(--gap));
    } */

    .ux-card-item img {
      max-height: 140px;
    }
  }

  /* Mobile (2 per row still, but smaller and responsive) */
  @media (max-width: 575.98px) {
    .ux-slide {
      flex: 0 0 calc(50% - var(--gap));
    }

    .ux-card-item {
      padding: 12px;
    }

    .ux-card-item img {
      max-height: 120px;
    }
  }



  /* pick the right background image per breakpoint */
  .slide-image {
    background-image: var(--bg-mobile);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  @media (min-width: 576px) {
    .slide-image {
      background-image: var(--bg-tablet);
    }
  }

  @media (min-width: 992px) {
    .slide-image {
      background-image: var(--bg-desktop);
    }
  }

  .ptb-50 {
    padding-top: 50px;
    padding-bottom: 50px;
  }

  .ideology {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>


<div class='row'>
  <div class="p-0 col-md-12 col-sm-12 col-12 container-fulid">
    <div class="swiper-container slideshow p-0">
      <div class="swiper-wrapper p-0">
        <?php for ($x = 0; $x < count($slider); $x++) {

          // Use your three fields; fall back gracefully if any is missing
          $desktop = base_url('upload/' . (!empty($slider[$x]['photo_desktop']) ? $slider[$x]['photo_desktop'] : ($slider[$x]['photo'] ?? '')));
          $tablet = base_url('upload/' . (!empty($slider[$x]['photo_tablet']) ? $slider[$x]['photo_tablet'] : (!empty($slider[$x]['photo_desktop']) ? $slider[$x]['photo_desktop'] : ($slider[$x]['photo'] ?? ''))));
          $mobile = base_url('upload/' . (!empty($slider[$x]['photo_mobile']) ? $slider[$x]['photo_mobile'] : (!empty($slider[$x]['photo_tablet']) ? $slider[$x]['photo_tablet'] : (!empty($slider[$x]['photo_desktop']) ? $slider[$x]['photo_desktop'] : ($slider[$x]['photo'] ?? '')))));
          ?>
          <div class="swiper-slide slide p-0">
            <div class="slide-image lazyload" style="
                --bg-desktop: url('<?= $desktop ?>');
                --bg-tablet:  url('<?= $tablet ?>');
                --bg-mobile:  url('<?= $mobile ?>');
              "></div>
            <span class="slide-title"></span>
          </div>
        <?php } ?>
      </div>
      <div class="slideshow-pagination pb-50"></div>
      <div class="slideshow-navigation">
        <div class="slideshow-navigation-button prev"><span class="fas fa-chevron-left"></span></div>
        <div class="slideshow-navigation-button next"><span class="fas fa-chevron-right"></span></div>
      </div>
    </div>
  </div>
</div>


<!-- <section class="ux-featured-section">
  <div class="container-fluid p-0">
    <div class="ux-slider" id="goalsSlider" aria-label="Goals Slider">
      
      <div class="ux-slider-viewport" id="goalsViewport">
        <div class="ux-slider-track" id="goalsTrack">
          <?php foreach ($goals as $goal) { ?>
            <div class="ux-slide">
              <div class="ux-card-item">
                <div class="ux-card-icon">
                  <img src="<?= base_url("upload/$goal->icon") ?>" alt="Goal Icon">
                </div>
                <span class="ux-card-title">
                  <?= $goal->title ?>
                </span>
                <a href="<?= base_url("home/goals/" . urlencode($goal->slug)) ?>" class="ux-card-link">
                  <?= lang('know_more') ?>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section> -->
<section class="ux-featured-section">
  <div class="ux-slider">
    <div class="ux-slider-track">
      <?php foreach ($goals as $goal) { ?>
        <div class="ux-slide">
          <div class="ux-card-item">
            <img src="<?= base_url("upload/$goal->icon") ?>" alt="Goal Icon">
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>


<!-- <div class="container my-5">
  <div class="row">
    <div class="col-md-6">
      <div class="notice-block" id="current-advertisement">
        <div class="title">
          <span><i class="fa fa-envelope faa-shake animated fa-lg"></i> <?= lang('e_notice_board') ?></span>
        </div>
        <marquee direction="up" class="marquee-content" scrollamount="3">
          <div class="content" onmouseover="this.parentNode.stop()" onmouseout="this.parentNode.start()">
            <ul>
              <?php foreach ($announcements as $noticeAnnouncement): ?>
                <?php if ($noticeAnnouncement->type == 'E-notice board'): ?>
                  <li><a target="_blank"
                      href="<?php echo base_url('upload/' . $noticeAnnouncement->document); ?>"><?php echo htmlspecialchars($noticeAnnouncement->title); ?></a>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </marquee>
      </div>
    </div>

    <div class="col-md-6">
      <div class="notice-block" id="examination-callletter">
        <div class="title">
          <span><i class="fa fa-newspaper faa-tada animated fa-lg"></i> <?= lang('whats_next') ?>?</span>
        </div>
        <marquee direction="up" class="marquee-content" scrollamount="3">
          <div class="content" onmouseover="this.parentNode.stop()" onmouseout="this.parentNode.start()">
            <ul>
              <?php foreach ($announcements as $NextAnnouncement): ?>
                <?php if ($NextAnnouncement->type == "What's next"): ?>
                  <li><a target="_blank"
                      href="<?php echo base_url('upload/' . $NextAnnouncement->document); ?>"><?php echo htmlspecialchars($NextAnnouncement->title); ?></a>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </marquee>
      </div>
    </div>
  </div>
</div> -->

<!-- <section id="about-part" class="pt-40 pb-0">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-12 col-sm-12">
        <span class="h2"><b><?= $ideology->title ?></b></span>
        <div class="bar"></div>
        <div class="about-cont bg-white">
          <p style="color: #111; overflow:hidden;" data-aos="fade-right" data-aos-duration="1000">
            <?= $ideology->description ?>
          </p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 p-0 m-0">
        <div class="p-0 m-0 text-center Statue" data-aos="fade-left" data-aos-duration="1000">
          <img loading="lazy" src="<?= base_url("upload/{$ideology->photo}"); ?>" class="" alt="img">
        </div>
      </div>
    </div>
  </div>
</section> -->

<div class="section-title" style="margin-bottom: 20px !important;">
  <h2><?= $ideology->title ?></h2>
  <div class="bar"></div>
  <p><?= lang('our_ideology_subtitle') ?></p>
</div>
<div class="container-fluid ptb-50 ideology mt-md-"
  style="background-image: url(<?= base_url('assets/images/ideology-banner.png') ?>);">
  <section id="president-info" class="card  m-md-5" style="width:-webkit-fill-available;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-5 col-sm-12 mb-4 mt-3">
          <div class="text-center" data-aos-duration="1000">
            <img loading="lazy" src="<?= base_url("upload/{$ideology->photo}"); ?>" class="" alt="img"
              style="height: 436px;">
            <!-- <img loading="lazy" src="<?= base_url("upload/{$president_message->photo}"); ?>"
              class="img-fluid rounded-circle shadow-lg" alt="President Image" style="max-width: 70%;"> -->
          </div>
        </div>
        <div class="col-lg-8 col-md-7 col-12">
          <div class="p-4 mx-2">
            <!-- <h2 class="font-weight-bold" style="color: #21559b;" data-aos-duration="1000">
              <?= $ideology->title ?>
            </h2> -->
            <h3 class="font-weight-bold text-secondary mb-4" data-aos-duration="1000">
              <!-- <?= $president_message->sub_title ?> -->
            </h3>
            <div class="about-cont mb-4">
              <p class="text-dark main-p" style="overflow: hidden;" data-aos-duration="1000">

                <?php

                $length = $this->session->userdata('language_id') == '2' ? 2495 : 1400;

                $synopsis = $ideology->description ?? "--";
                $short_synopsis = substr($synopsis, 0, $length);
                $is_long = strlen($synopsis) > $length;
                ?>
              <div class="short-text">
                <?= nl2br($short_synopsis) ?> <?= $is_long ? "..." : "" ?>
              </div>

              <?php if ($is_long): ?>
                <div class="full-text" style="display: none;">
                  <?= nl2br($synopsis) ?>
                </div>
                <a href="javascript:void(0);" class="see-more">Read More</a>
              <?php endif; ?>

              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--<style>-->
    <!--    #president-info {-->
    <!--        position: relative;-->
    <!--    }-->
    <!--    #president-info::before {-->
    <!--        content: '';-->
    <!--        position: absolute;-->
    <!--        top: 0;-->
    <!--        left: 0;-->
    <!--        right: 0;-->
    <!--        bottom: 0;-->
    <!--        background: rgba(255, 255, 255, 0.5);-->
    <!--        border-radius: 15px;-->
    <!--        z-index: -1;-->
    <!--        filter: blur(10px);-->
    <!--    }-->
    <!--</style>-->
  </section>
</div>

<!-- <section class="featured-boxes-area">
  <div class="container-fluid shadow-lg p-0">
    <div class="featured-boxes-inner">
      <div class="row m-0 justify-content-center">
        <?php foreach ($goals as $goal) { ?>
          <div class="col-lg-2 col-sm-6 col-md-6 p-0" data-aos="zoom-in-up">
            <div class="single-featured-box">
              <div class="icon color-fb7756">
                <img src="<?= base_url("upload/$goal->icon") ?>" width="45" height="45" class="bi bi-diagram-3" />
              </div>
              <span class="h5 fw-bold"><?= $goal->title ?></span>
              <a href="<?= base_url("home/goals/" . urlencode($goal->slug)) ?>"
                class="read-more-btn"><?= lang('know_more') ?></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section> -->

<section class="pt-20 container-fluid">
  <div class="section-title" style="margin-bottom: 0px !important;">
    <h2><?= lang('documentary') ?></h2>
    <!-- <span class="h2"><b><?= lang('documentary') ?></b></span> -->
    <div class="bar"></div>
    <p><?= lang('documentary_subtitle') ?></p>

  </div>

  <div class="row testimonial-slied">
    <?php for ($x = 0; $x < count($documentary); $x++) { ?>
      <div class="col-lg-4 px-2">
        <div class="singel-teachers mt-30 text-center">
          <div class="image">
            <a target="_blank" href="<?= $documentary[$x]['youtube_link']; ?>">
              <img loading="lazy" src="<?= base_url() ?>upload/<?= $documentary[$x]['photo']; ?>" loading="lazy"
                alt="img">
            </a>
          </div>
          <div class="overview-box">
            <div class="overview-content">
              <div class="content left-content pe-0">
                <ul class="services-list">
                  <li class="p-0 cont">
                    <span class="p-0"
                      style="background:-webkit-gradient(linear,left top,right top,from(#0e9ea8),to(#43e794));background:linear-gradient(90deg,#0e9ea8 0,#43e794 100%);border-radius:4px;-webkit-transition:.5s;transition:.5s">
                      <h6 class="m-0 p-2 w-100" style="font-family:auto !important;">
                        <b><?= $documentary[$x]['title']; ?></b>
                      </h6>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>

<section class="pt-20 container-fluid">
  <div class="section-title" style="margin-bottom: 0px !important;">
    <h2><?= lang('magazines') ?></h2>
    <!-- <span class="h2"><b><?= lang('magazines') ?></b></span> -->
    <div class="bar"></div>
    <p><?= lang('magazines_subtitle') ?></p>
  </div>

  <div class="row testimonial-slied1">
    <?php for ($x = 0; $x < 4; $x++) { ?>
      <div class="col-lg-3 px-2">
        <div class="singel-teachers mt-30 text-center">
          <div class="image">
            <a target="_blank" href="<?= base_url() ?>upload/<?= $magazines[$x]['pdf']; ?>">
              <img loading="lazy" src="<?= base_url() ?>upload/<?= $magazines[$x]['photo']; ?>" alt="img">
            </a>
          </div>
          <div class="overview-box">
            <div class="overview-content">
              <div class="content left-content pe-0">
                <ul class="services-list">
                  <li class="p-0 cont">
                    <span class="p-0"
                      style="background:-webkit-gradient(linear,left top,right top,from(#0e9ea8),to(#43e794));background:linear-gradient(90deg,#0e9ea8 0,#43e794 100%);border-radius:4px;-webkit-transition:.5s;transition:.5s">
                      <a target="_blank" href="<?= base_url() ?>upload/<?= $magazines[$x]['pdf']; ?>">
                        <h6 class="m-0 p-2 text-white"><b><?= $magazines[$x]['title']; ?></b></h6>
                      </a>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="text-center p-3">
    <a href="<?= base_url('update'); ?>" class="btn m-0 text-white"
      style="background:linear-gradient(135deg,#ee0979 0,#ff6a00 100%);"><?= lang('know_more') ?></a>
  </div>

</section>
<section id="teachers-part" class="pt-0 pb-0">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-5 col-md-4 col-sm-12 col-12 px-2">
        <span class="h2"><b><?= $yuva_sangathan->title ?> </b></span>
        <div class="bar"></div>
        <div class="teachers-cont" style="overflow:hidden;">
          <p class="text-dark pt-0"><?= $yuva_sangathan->description ?><br><br>
            <a href="https://sardardham.org/youth/" target="_blank"
              class="btn btn-primary"><?= lang('click_here_registration') ?></a>
        </div>
      </div>
      <div class="col-lg-7 col-md-8 col-sm-12 col-12">
        <div class="teachers mt-20">
          <div class="row">
            <div class="col-sm-12">
              <div class="singel-teachers">
                <div class="text-center">
                  <img loading="lazy" src="<?= base_url("upload/$yuva_sangathan->photo"); ?>" class="" alt="Teachers"
                    style="margin:0 auto;border-radius: 9px;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="pt-20  container-fluid  justify-content-center">
  <div class="section-title" style="margin-bottom: 0px !important;">
    <h2><?= lang('news_event') ?></h2>
    <!-- <span class="h2"><b><?= lang('news_event') ?></b></span> -->
    <div class="bar"></div>
    <p><?= lang('news_event_subtitle') ?></p>
  </div>

  <div class="row testimonial-slied">
    <?php for ($x = 0; $x < count($events); $x++) { ?>
      <div class="col-lg-4 px-2 ">
        <div class="singel-teachers mt-30 text-center">
          <div class="image">
            <?php if ($events[$x]['id'] == 24) { ?>
              <a target="_blank" href="https://forms.gle/PAEy3spk7ZvB4S2JA">
                <img loading="lazy" src="<?= base_url() ?>upload/<?= $events[$x]['photo']; ?>" style=""
                  class="events-height" alt="img">
              </a>
            <?php } else { ?>
              <a target="_blank" href="<?= base_url() ?>update/news_details/<?= $events[$x]['slug']; ?>">
                <img loading="lazy" src="<?= base_url() ?>upload/<?= $events[$x]['photo']; ?>" style=""
                  class="events-height" alt="img">
              </a>
            <?php } ?>
          </div>
          <div class="overview-box">
            <div class="overview-content">
              <div class="content left-content pe-0">
                <ul class="services-list">
                  <li class="p-0 cont">
                    <span class="text-center p-0"
                      style="background:-webkit-gradient(linear,left top,right top,from(#0e9ea8),to(#43e794));background:linear-gradient(90deg,#0e9ea8 0,#43e794 100%);border-radius:4px;-webkit-transition:.5s;transition:.5s">
                      <?php if ($events[$x]['id'] == 24) { ?>
                        <a target="_blank" href="https://forms.gle/PAEy3spk7ZvB4S2JA">
                          <h6 class="m-0 p-2 text-white"><b><?= $events[$x]['title']; ?></b></h6>
                          <h6 class="m-0 pb-1 text-white"><?= $events[$x]['event_date']; ?></h6>
                        </a>
                      <?php } else { ?>
                        <a target="_blank" href="<?= base_url() ?>update/news_details/<?= $events[$x]['slug']; ?>">
                          <h6 class="m-0 p-2 text-white"><b><?= $events[$x]['title']; ?></b></h6>
                          <h6 class="m-0 pb-1 text-white"><?= $events[$x]['event_date']; ?></h6>
                        </a>
                      <?php } ?>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="text-center p-3">
    <a href="<?= base_url('update/news'); ?>" class="btn m-0 text-white"
      style="background:linear-gradient(135deg,#ee0979 0,#ff6a00 100%);"><?= lang('know_more') ?></a>
  </div>
</section>

<div class="modal fade" id="myModalhomepage" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn close ms-auto" data-bs-dismiss="modal">Close</button>

      </div>
      <div class="modal-body text-center">
        <img src="<?= base_url('assets/forms/advertise.jpeg'); ?>">
        <h5 class="modal-title"><?= lang('patidar_udyog_ratna_award_application_form') ?></h5>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <a href="<?= base_url('assets/forms/Patidar Udyog Ratan Award_Form.pdf'); ?>" target="_blank"
          class="btn btn-primary"><?= lang('click_here_for_form_download') ?></a>
      </div>
    </div>

  </div>
</div>

<!--<div class="modal fade" id="myModalpopuppage" role="dialog">-->
<!--  <div class="modal-dialog">-->

<!-- Modal content-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--      <?= lang('quick_links') ?>-->
<!--        <button type="button" class="btn close ms-auto" data-bs-dismiss="modal"><?= lang('close') ?></button>-->

<!--      </div>-->

<!--      <div class="modal-body text-center">-->
<!--      <div class="">-->
<!-- <button type="button" class="btn btn-primary"><a href="<?= base_url('assets/form1.jpeg'); ?>" target="_blank" download>Click here for Application in Samaj Setu Samiti</a>      </button> -->
<!--          <button  type="button" class="btn btn-primary"> <a href="https://csc.sardardham.org/home/scholarship" target="_blank"><?= lang('click_here_apply_scholarship') ?></a></button>-->
<!--      </div>-->


<!--      </div>-->
<!--      <div class="modal-footer d-flex justify-content-center">-->

<!--      </div>-->

<!--    </div>-->

<!--  </div>-->
<!--</div>-->

<!-- popup model dynamic -->

<!-- Language Modal -->

<!-- <div class="modal fade" id="popupModel" tabindex="-1" aria-labelledby="popupModelLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-radius: 10px; box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);">
      <div class="modal-header" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <h5 class="modal-title" id="popupModelLabel">
          < htmlspecialchars($popup->title) ?>
        </h5>
      </div>
      <div class="modal-body" style="padding: 30px;">
        <form id="languageForm"> -->

<!-- Check if there is an image uploaded -->
<!-- < if (!empty($popup->photo)): ?>
            <div class="mb-4 text-center">
              <img src="< base_url("upload/") . htmlspecialchars($popup->photo) ?>" alt="Popup Image"
                style="border-radius: 10px;height: 250px;">
            </div>
          < endif; ?> -->


<!-- Check if there is a description -->
<!-- < if (!empty($popup->description)): ?>
            <div class="mb-3">
              <p>< nl2br(($popup->description)) ?></p>
            </div>
          < endif; ?> -->

<!-- Check if there's a PDF -->
<!-- < if (!empty($popup->pdf)): ?>
            <div class="mb-4">
              <a href="< base_url("upload/") . htmlspecialchars($popup->pdf) ?>" target="_blank"
                class="btn btn-secondary w-100" style="padding: 12px; border-radius: 8px; font-size: 1.1rem;">View PDF</a>
            </div>
          < endif; ?>


          <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal"
            style="padding: 12px; border-radius: 8px; font-size: 1.1rem; background-color: #05C0C0; border: none;">Close</button>
        </form>
      </div>
    </div>
  </div>
</div> -->

<?php $this->load->view('popup_modal'); ?>

<script>

  // The Slideshow class.
  class Slideshow {
    constructor(el) {

      this.DOM = { el: el };

      this.config = {
        slideshow: {
          delay: 3000,
          pagination: {
            duration: 3,
          }
        }
      };

      // Set the slideshow
      this.init();

    }
    init() {

      var self = this;

      // Charmed title
      this.DOM.slideTitle = this.DOM.el.querySelectorAll('.slide-title');
      this.DOM.slideTitle.forEach((slideTitle) => {
        charming(slideTitle);
      });

      // Set the slider
      this.slideshow = new Swiper(this.DOM.el, {

        loop: true,
        autoplay: {
          delay: this.config.slideshow.delay,
          disableOnInteraction: false,
        },
        speed: 1000,
        preloadImages: true,
        updateOnImagesReady: true,

        // lazy: true,
        // preloadImages: false,

        pagination: {
          el: '.slideshow-pagination',
          clickable: true,
          bulletClass: 'slideshow-pagination-item',
          bulletActiveClass: 'active',
          clickableClass: 'slideshow-pagination-clickable',
          modifierClass: 'slideshow-pagination-',
          renderBullet: function (index, className) {
            var slideIndex = index,
              number = (index <= 9) ? '0' + (slideIndex + 1) : (slideIndex + 1);

            var paginationItem = '<span class="slideshow-pagination-item">';
            paginationItem += '<span class="pagination-number">' + number + '</span>';
            paginationItem = (index <= 9) ? paginationItem + '<span class="pagination-separator"><span class="pagination-separator-loader"></span></span>' : paginationItem;
            paginationItem += '</span>';

            return paginationItem;
          },
        },

        // Navigation arrows
        navigation: {
          nextEl: '.slideshow-navigation-button.next',
          prevEl: '.slideshow-navigation-button.prev',
        },

        // And if we need scrollbar
        scrollbar: {
          el: '.swiper-scrollbar',
        },

        on: {
          init: function () {
            self.animate('next');
          },
        }

      });

      // Init/Bind events.
      this.initEvents();

    }
    initEvents() {

      this.slideshow.on('paginationUpdate', (swiper, paginationEl) => this.animatePagination(swiper, paginationEl));
      //this.slideshow.on('paginationRender', (swiper, paginationEl) => this.animatePagination());

      this.slideshow.on('slideNextTransitionStart', () => this.animate('next'));

      this.slideshow.on('slidePrevTransitionStart', () => this.animate('prev'));

    }
    animate(direction = 'next') {

      // Get the active slide
      this.DOM.activeSlide = this.DOM.el.querySelector('.swiper-slide-active'),
        this.DOM.activeSlideImg = this.DOM.activeSlide.querySelector('.slide-image'),
        this.DOM.activeSlideTitle = this.DOM.activeSlide.querySelector('.slide-title'),
        this.DOM.activeSlideTitleLetters = this.DOM.activeSlideTitle.querySelectorAll('span');

      // Reverse if prev  
      this.DOM.activeSlideTitleLetters = direction === "next" ? this.DOM.activeSlideTitleLetters : [].slice.call(this.DOM.activeSlideTitleLetters).reverse();

      // Get old slide
      this.DOM.oldSlide = direction === "next" ? this.DOM.el.querySelector('.swiper-slide-prev') : this.DOM.el.querySelector('.swiper-slide-next');
      if (this.DOM.oldSlide) {
        // Get parts
        this.DOM.oldSlideTitle = this.DOM.oldSlide.querySelector('.slide-title'),
          this.DOM.oldSlideTitleLetters = this.DOM.oldSlideTitle.querySelectorAll('span');
        // Animate
        this.DOM.oldSlideTitleLetters.forEach((letter, pos) => {
          TweenMax.to(letter, .3, {
            ease: Quart.easeIn,
            delay: (this.DOM.oldSlideTitleLetters.length - pos - 1) * .04,
            y: '50%',
            opacity: 0
          });
        });
      }

      // Animate title
      this.DOM.activeSlideTitleLetters.forEach((letter, pos) => {
        TweenMax.to(letter, .6, {
          ease: Back.easeOut,
          delay: pos * .05,
          startAt: { y: '50%', opacity: 0 },
          y: '0%',
          opacity: 1
        });
      });

      // Animate background
      TweenMax.to(this.DOM.activeSlideImg, 1.5, {
        ease: Expo.easeOut,
        startAt: { x: direction === 'next' ? 200 : -200 },
        x: 0,
      });

      //this.animatePagination()

    }
    animatePagination(swiper, paginationEl) {

      // Animate pagination
      this.DOM.paginationItemsLoader = paginationEl.querySelectorAll('.pagination-separator-loader');
      this.DOM.activePaginationItem = paginationEl.querySelector('.slideshow-pagination-item.active');
      this.DOM.activePaginationItemLoader = this.DOM.activePaginationItem.querySelector('.pagination-separator-loader');

      //   console.log(swiper.pagination);
      // console.log(swiper.activeIndex);

      // Reset and animate
      TweenMax.set(this.DOM.paginationItemsLoader, { scaleX: 0 });
      TweenMax.to(this.DOM.activePaginationItemLoader, this.config.slideshow.pagination.duration, {
        startAt: { scaleX: 0 },
        scaleX: 1,
      });


    }

  }

  const slideshow = new Slideshow(document.querySelector('.slideshow'));

</script>
<script type="text/javascript">
  $(window).on('load', function () {
    $('#myModalpopuppage').modal('show');
  });

  $(document).on('click', ".see-more", function () {
    var $this = $(this);
    var $td = $this.parents(".about-cont");

    if ($this.text() === "Read More") {
      $td.find(".short-text").slideUp(300);
      $td.find(".full-text").slideDown(300);
      $this.text("See Less");
    } else {
      $td.find(".full-text").slideUp(300);
      $td.find(".short-text").slideDown(300);
      $this.text("Read More");
    }
  });
</script>

<script>
  (function () {
    const slider = document.getElementById('goalsSlider');
    const viewport = document.getElementById('goalsViewport');
    const track = document.getElementById('goalsTrack');
    const slides = Array.from(track.querySelectorAll('.ux-slide'));
    const cards = Array.from(track.querySelectorAll('.ux-card-item'));

    /* --- Helpers --- */
    function updateEdgesState() {
      const maxScroll = viewport.scrollWidth - viewport.clientWidth - 1;
      const x = viewport.scrollLeft;
      slider.classList.toggle('at-start', x <= 0);
      slider.classList.toggle('at-end', x >= maxScroll);
    }

    function centerScale() {
      const vpRect = viewport.getBoundingClientRect();
      const centerX = vpRect.left + vpRect.width / 2;
      cards.forEach((card) => {
        const rect = card.getBoundingClientRect();
        const cardCenter = rect.left + rect.width / 2;
        const dist = Math.abs(cardCenter - centerX);
        const maxDist = vpRect.width / 2;
        let proximity = 1 - Math.min(1, dist / maxDist);
        proximity = Math.pow(proximity, 1.5);
        card.style.setProperty('--proximity', proximity.toFixed(3));
      });
    }

    /* ---- Drag-to-scroll with click-through fix ---- */
    let isPointerDown = false;
    let isDragging = false;
    let startX = 0;
    let startScroll = 0;
    const DRAG_THRESHOLD = 8; // px before we treat as a drag

    viewport.addEventListener('pointerdown', (e) => {
      if (e.button !== 0) return; // left button / primary touch
      isPointerDown = true;
      isDragging = false;
      startX = e.clientX;
      startScroll = viewport.scrollLeft;
    });

    viewport.addEventListener('pointermove', (e) => {
      if (!isPointerDown) return;
      const dx = e.clientX - startX;
      if (!isDragging && Math.abs(dx) >= DRAG_THRESHOLD) {
        isDragging = true;
        viewport.setPointerCapture(e.pointerId); // capture ONLY after threshold
        viewport.style.cursor = 'grabbing';
      }
      if (isDragging) {
        viewport.scrollLeft = startScroll - dx;
      }
    });

    function endPointer(e) {
      if (!isPointerDown) return;
      if (isDragging) {
        // we dragged -> suppress the "click" that would follow
        e.preventDefault();
        e.stopPropagation();
      }
      isPointerDown = false;
      isDragging = false;
      viewport.style.cursor = '';
      try { viewport.releasePointerCapture(e.pointerId); } catch (_) { }
    }

    viewport.addEventListener('pointerup', endPointer);
    viewport.addEventListener('pointercancel', endPointer);

    // As a safety net, cancel clicks that occur right after a drag (capture phase)
    viewport.addEventListener('click', (e) => {
      if (isDragging) { e.preventDefault(); e.stopPropagation(); }
    }, true);

    /* Vertical wheel -> horizontal scroll */
    viewport.addEventListener('wheel', (e) => {
      if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
        viewport.scrollBy({ left: e.deltaY });
      }
    }, { passive: false });

    /* Scroll/resize handlers */
    let rafId = null;
    function onScroll() {
      if (rafId) return;
      rafId = requestAnimationFrame(() => {
        updateEdgesState();
        centerScale();
        rafId = null;
      });
    }
    window.addEventListener('resize', onScroll, { passive: true });
    viewport.addEventListener('scroll', onScroll, { passive: true });

    // Initial paint
    updateEdgesState();
    centerScale();
  })();
</script>