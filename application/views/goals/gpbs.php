<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-2">
        <h2><b><?= lang('gpbs_title'); ?></b></h2>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('gpbs_tagline'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <span>
            <?= lang('gpbs_overview_1'); ?>
        </span>
        <span>
            <?= lang('gpbs_overview_2'); ?>
        </span>
        <span>
            <?= lang('gpbs_overview_3'); ?>
        </span>
    </div>

    <div class="mt-4 content-box mx-auto ">
        <?php
        // $images = glob(FCPATH . 'assets/images/goals/csc/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        // natsort($images);  // Natural human sorting
        $images = ["GPBS-1.jpg", "GPBS-2.jpg", "GPBS-3.jpg"];
        $data['images'] = [];
        foreach ($images as $img) {
            $data['images'][] = base_url('assets/images/goals/' . $img);
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
                    <h2><b><?= lang('objectives'); ?></b></h2>
                    <div class="bar mx-auto"></div>
                </div>
                <span>
                    <ul>
                        <li><?= lang('objective_1'); ?></li>
                        <li><?= lang('objective_2'); ?></li>
                        <li><?= lang('objective_3'); ?></li>
                        <li><?= lang('objective_4'); ?></li>
                    </ul>
                </span>
            </div>
            <div class="col-md-6">
                <div class="text-center mb-2 mt-3">
                    <h2><b><?= lang('highlights'); ?></b></h2>
                    <div class="bar mx-auto"></div>
                </div>
                <span>
                    <ul>
                        <li><?= lang('highlights_1'); ?></li>
                        <li><?= lang('highlights_2'); ?></li>
                        <li><?= lang('highlights_3'); ?></li>
                        <li><?= lang('highlights_4'); ?></li>
                        <li><?= lang('highlights_5'); ?></li>
                    </ul>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <span>
                    <?= lang('gpbs_last_line'); ?>
                </span>
            </div>
        </div>
    </div>

    <!-- GPBS Glimpses Section -->
    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mt-3">
        <div class="text-center mb-3">
            <h2><b>GPBS Glimpses</b></h2>
            <div class="bar mx-auto"></div>
            <p>Watch the highlights of GPBS from past years</p>
        </div>
        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="https://www.youtube.com/watch?v=63NfBHoEzKg" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2018
            </a>
            <a href="https://youtu.be/yFIKPOZFSpU" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2020
            </a>
            <a href="https://youtu.be/wbhFtFfDZYQ" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2022
            </a>
            <a href="https://youtu.be/w38OnaJlJh4" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2024
            </a>
            <a href="https://youtu.be/-POWIgyx8pY" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2025
            </a>
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

    .content-box {
        max-width: 90%;
        font-size: 18px;
        line-height: 1.7;
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