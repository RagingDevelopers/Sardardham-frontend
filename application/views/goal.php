<style>
    ::marker {
        font-size: 15px;
    }

    @media (min-width: 768px) {

        /* For medium screens and up */
        .inner-page {
            font-size: 70px !important;
        }

    }

    @media only screen and (max-width: 600px) {
        .p-5 {
            padding: 2rem !important;
        }
    }

    .about-cont p {
        padding-top: 0px !important;
    }
</style>
<!-- <div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
        class="p-5"><?= $goal->title ?></span></div> -->

<div class="container-fluid">
    <section id="about-part" class="pt-40 pb-0">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <h2><b><?= $goal->title ?></b></h2>
                <div class="bar"></div>
            </div>

            <?php if (isset($goal->photo) && !empty($goal->photo)) { ?>
                <div class="col-lg-5 col-md-5 col-12 p-0 m-0" data-aos="fade-right" data-aos-duration="1000">
                    <div class="p-0 m-0">
                        <img src="<?= base_url("upload/{$goal->photo}"); ?>" class="" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12" data-aos="fade-left" data-aos-duration="1000">
                    <div class="about-cont bg-white">
                        <p style="color:black; overflow:hidden;">
                            <?= $goal->description ?>
                        </p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-12 col-12 mb-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="about-cont bg-white">
                        <p style="color:black; overflow:hidden;">
                            <?= $goal->description ?>
                        </p>
                    </div>
                </div>
            <?php } ?>

            <?php
            $link = "";
            if ($goal->slug == "civil-service-centre") {
                $link = "https://csc.sardardham.org/";
            } else if ($goal->slug == "global-patidar-business-organization") {
                $link = "https://gpbo.org/";
            } else if ($goal->slug == "global-patidar-business-summit-gpbs") {
                $link = "https://gpbs.in/";
            } else if ($goal->slug == "youth-organization") {
                $link = "https://sardardham.org/youth/";
            }
            ?>

            <?php if (!empty($link)): ?>
                <div class="form-group d-flex justify-content-center">
                    <a href="<?= $link ?>" target="_blank">
                        <button class="btn btn-primary"><?= lang('go_to_website') ?></button>
                    </a>
                </div>
            <?php endif; ?>

            <!-- < if ($goal->slug == "youth-organization") { ?>
                <div class="col-md-12  text-center my-3" data-aos="fade-left" data-aos-duration="1000">
                    <a href="https://sardardham.org/youth/" target="_blank"
                        class="btn btn-primary">< lang('click_here_registration') ?></a>
                </div>
            < } ?> -->
        </div>
    </section>


</div>