<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-2">
        <h2><b><?= lang('medical_centre_title'); ?></b></h2>
        <h3><b><?= lang('medical_centre_sub_title_1'); ?></b></h3>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('medical_centre_sub_title_2'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <span>
            <?= lang('medical_centre_1'); ?>
        </span>
        <span>
            <?= lang('medical_centre_2'); ?>
        </span>
        <span>
            <?= lang('medical_centre_3'); ?>
        </span>
        <span>
            <?= lang('medical_centre_4'); ?>
        </span>
        <span>
            <ul>
                <li><?= lang('medical_centre_commitment_1'); ?></li>
                <li><?= lang('medical_centre_commitment_2'); ?></li>
                <li><?= lang('medical_centre_commitment_3'); ?></li>
                <li><?= lang('medical_centre_commitment_4'); ?></li>
            </ul>
        </span>
    </div>

    <div class="mt-4 content-box mx-auto ">
        <?php
        // $images = glob(FCPATH . 'assets/images/goals/csc/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        // natsort($images);  // Natural human sorting
        $images = ["medical-center-Images-1.jpg", "medical-center-Images-2.jpg"];
        $data['images'] = [];
        foreach ($images as $img) {
            $data['images'][] = base_url('assets/images/' . $img);
        }
        ?>
        <?php if (!empty($data['images'])): ?>
            <div id="cscCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0;
                    foreach ($data['images'] as $img): ?>
                        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                            <img src="<?= $img ?>" class="d-block w-100" alt="Image-not-found">
                        </div>
                        <?php $i++; endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#cscCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#cscCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mt-2">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center mb-2 mt-3">
                    <h2><b><?= lang('medical_centre_title_5'); ?></b></h2>
                    <div class="bar mx-auto"></div>
                </div>
                <span>
                    <ul>
                        <li><?= lang('medical_centre_diagnostic_1'); ?></li>
                        <li><?= lang('medical_centre_diagnostic_2'); ?></li>
                        <li><?= lang('medical_centre_diagnostic_3'); ?></li>
                        <li><?= lang('medical_centre_diagnostic_4'); ?></li>
                        <li><?= lang('medical_centre_diagnostic_5'); ?></li>
                        <li><?= lang('medical_centre_diagnostic_6'); ?></li>
                    </ul>
                </span>
            </div>
            <div class="col-md-6">
                <div class="text-center mb-2 mt-3">
                    <h2><b><?= lang('medical_centre_title_6'); ?></b></h2>
                    <div class="bar mx-auto"></div>
                </div>
                <span>
                    <ul>
                        <li><?= lang('medical_centre_specialist_1'); ?></li>
                        <li><?= lang('medical_centre_specialist_2'); ?></li>
                        <li><?= lang('medical_centre_specialist_3'); ?></li>
                        <li><?= lang('medical_centre_specialist_4'); ?></li>
                        <li><?= lang('medical_centre_specialist_5'); ?></li>
                        <li><?= lang('medical_centre_specialist_6'); ?></li>
                    </ul>
                </span>
            </div>

            <div class="text-center">
                <h3><b><?= lang('medical_centre_title_7'); ?></b></h3>
                <div class="bar mx-auto"></div>
                <span class="text-center">
                    <?= lang('medical_centre_medicine_1'); ?>
                </span>
            </div>
        </div>

    </div>


    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mt-3">
        <div class="row justify-content-between text-center">
            <div class="col-md-5 mb-3">
                <button class="btn btn-primary btn-lg px-4">
                    <?= lang('medical_centre_title_8'); ?>
                </button>
                <div class="mt-2">
                    <span>
                        <?= lang('medical_centre_opd_timings'); ?><br>
                        <!-- Monday to Saturday:<br>
                        * 9:00 AM to 12:30 PM<br>
                        * 3:00 PM to 6:00 PM -->
                    </span>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <button class="btn btn-primary btn-lg">
                    <?= lang('medical_centre_title_9'); ?>
                </button>
                <div class="mt-2">
                    <span>
                        <?= lang('medical_centre_contact_address'); ?><br>
                        <!-- 75750 07801 / 75750 06336<br>
                        Near Sardardham, Vaishnodevi<br>
                        Circle, S.P. Ring Road, Ahmedabad -->
                    </span>
                </div>
            </div>
        </div>
    </div>


</section>

<style>
    #building-projects {
        scroll-margin-top: 80px;
    }

    #cscCarousel img {
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    #building-projects .project {
        max-width: 90%;
        margin: 0 auto;
    }

    #building-projects .image-container {
        width: 100%;
        /* max-height: 444px; */
        overflow: hidden;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .content-box {
        max-width: 90%;
        font-size: 18px;
        line-height: 1.7;
    }

    #building-projects .project-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.35s ease;
    }

    #building-projects .project-img:hover {
        transform: scale(1.05);
    }

    .btn-primary {
        border-radius: 50px;
        padding: 12px 25px;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0047ab;
        transform: scale(1.05);
    }
</style>