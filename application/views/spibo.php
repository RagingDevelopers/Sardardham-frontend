<style>
    ::marker {
        font-size: 15;
    }


    .about-cont p {
        padding-top: 0px !important;
    }

    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 27px;
            padding: 2rem !important;
        }
    }
</style>
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
        class=""><?= lang('spibo_full_form') ?></span>
</div>

<div class="container-fluid mt-4">
    <div class="form-group">
        <p style="color: #111; overflow:hidden;" data-aos="fade-right" data-aos-duration="1000">
            <?= $spibo->description ?? "" ?>
        </p>
    </div>
    <div class="form-group d-flex justify-content-center">
        <a href="https://spibo.in/" target="_blank"><button
                class="btn btn-primary"><?= lang('view_more') ?></button></a>
    </div>
</div>