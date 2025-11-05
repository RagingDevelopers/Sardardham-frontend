<div class="row mb-2">
    <?php if (!empty($documentary)) { ?>
        <?php for ($x = 0; $x < count($documentary); $x++) { ?>
            <div class="col-lg-4 px-2" data-aos="zoom-out">
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
    <?php } else { ?>
        <div class="col-12 text-center my-5">
            <div class="no-available alert">
                <h4>No Videos Available in the Video Gallery For Selected Year</h4>
                <p>We’re currently updating our video gallery. Please check back soon to explore new videos.</p>
                <a href="/" class="btn-back-home">Return to Home</a>
            </div>
        </div>
    <?php } ?>
</div>