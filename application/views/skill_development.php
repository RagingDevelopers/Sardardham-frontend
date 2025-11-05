<style>
    ::marker {
        font-size: 15px;
    }


    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
    }
</style>
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
        class=""><?= lang('skill_development_sardardham') ?></span>
</div>

<div class="container-fluid mt-4">
    <div class="form-group">
        <p style="color: #111; overflow:hidden;" data-aos="fade-right" data-aos-duration="1000">
            <?= $skill_development->description ?>
        </p>
    </div>
    <!--<div class="form-group d-flex justify-content-center">-->
    <!--    <button class="btn btn-primary">Payment Button</button>-->
    <!--</div>-->
</div>