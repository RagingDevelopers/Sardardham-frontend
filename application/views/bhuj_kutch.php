<style>
    ::marker {
        font-size: 1.5em;
    }

    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
    }
</style>
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
        class=""><?= lang('bhuj_katch') ?></span>
</div>

<div class="container-fluid mt-4">
    <div class="form-group">
        <p style="color: #111; overflow:hidden;" data-aos="fade-right" data-aos-duration="1000">
            <?= $admission->description ?>
        </p>
    </div>
    <div class="form-group d-flex justify-content-center">
        <a href="https://bhuj.sardardham.org/" target="_blank"><button
                class="btn btn-primary"><?= lang('go_to_website') ?></button></a>
    </div>
</div>