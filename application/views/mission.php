<style>
    ::marker {
        font-size: 15px;
    }

    .contents {
        display: contents !important;
    }



    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
    }
</style>
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
        class="contents"><?= lang('mission_vision_goals') ?></span>
</div>

<div class="row mt-1">
    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
        <h2><b><?= lang('mission_vision_goals') ?></b></h2>
        <div class="bar mx-auto"></div>
        <p style="margin-bottom:20px;"><?= lang('mission_vision_goals_title') ?></p>
    </div>
</div>

<div class="pt-10">
    <div
        style="background-image: url('<?= base_url("upload/Back-min.png") ?>'); background-position: center;background-repeat: no-repeat; background-size: cover; position: relative;">
        <div class="container pt-0">
            <section id="apply-aprt" data-aos="right" data-aos-duration="1000">
                <div class="row">
                    <?php foreach ($data as $key => $row) {
                        if ($key == "Goals")
                            continue ?>
                            <div class="col-lg-6 col-sm-12 col-md-6 col-12">
                                <div class="p-3" <?php if ($key == "Mission") { ?>
                                    style="background-image: url('<?= base_url("upload/BackgroundMissionVision.png") ?>'); background-position: right;background-repeat: no-repeat; background-size: contain; position: relative;"
                                <?php } ?>>
                                <h2><b><?= $key ?></b></h2>
                                <div class="bar"></div>
                                <?php foreach ($row as $v) { ?>
                                    <div class="h5 fw-bold d-flex" style="color:#502b44;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                            class="bi bi-check2" viewBox="0 0 16 16">
                                            <path
                                                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                        <?= $v['description'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </section>
        </div>
    </div>

</div>

<div class="container pt-40">
    <section id="apply-aprt" data-aos="right" data-aos-duration="1000">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-12">
                <div class="p-3">
                    <div class="section-title">
                        <h2><b><?= lang('goals') ?></b></h2>
                        <div class="bar"></div>
                    </div>
                    <?php foreach ($data['Goals'] as $row) { ?>
                        <div class="h5 fw-bold p-1 d-flex goals"
                            style="color:#502b44; background-image: linear-gradient(to right, #bfb2a9, white);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-check2" viewBox="0 0 16 16">
                                <path
                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                            </svg>
                            <?= $row['description'] ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </section>
</div>