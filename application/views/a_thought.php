<style>
    ::marker {
        font-size: 15px;
    }

    .contents {
        display: contents !important;
    }

    .about-cont p {
        padding-top: 0px !important;
    }

    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
    }
</style>
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
        class="contents"><?= lang('a_thought') ?></span>
</div>
<div class="container-fluid">
    <section id="about-part" class="pt-20 pb-0">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                <h2><b><?= lang('a_thought') ?></b></h2>
                <div class="bar mx-auto"></div>
                <p style="margin-bottom:20px;"><?= lang('thought_title') ?></p>
            </div>
            <div class="col-lg-5 col-md-5 col-12 p-0 m-0">
                <div class="p-0 m-0" data-aos="fade-up" data-aos-duration="1000">
                    <img src="<?= base_url("upload/{$thought->photo}"); ?>" class="" alt="">
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-12">
                <div class="about-cont bg-white">
                    <p style="color:black; overflow:hidden;" data-aos="fade-up" data-aos-duration="1000">
                        <?= $thought->description ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>