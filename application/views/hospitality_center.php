<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-2">
        <h2><b><?= lang('hospitality_title'); ?></b></h2>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('hospitality_sub_title_1'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <span>
            <?= lang('hospitality_1'); ?>
        </span>
        <span>
            <?= lang('hospitality_2'); ?>
        </span>
        <span>
    </div>

    <div class="mt-4 content-box mx-auto ">
        <?php
        // $images = glob(FCPATH . 'assets/images/goals/csc/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        // natsort($images);  // Natural human sorting
        $images = ["Hospitality-center-Images-4.jpg", "Hospitality-center-Images-3.jpg"];
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

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <div class="text-center mb-2 mt-3">
            <h2><b><?= lang('hospitality_sub_title_2'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <h4 class="text-center"><b><?= lang('hospitality_facilities_title_1'); ?></b></h4>
            <?= lang('hospitality_facilities_1'); ?>

            <ul>
                <li><?= lang('hospitality_facilities_2'); ?></li>
                <li><?= lang('hospitality_facilities_3'); ?></li>
            </ul>

            <?= lang('hospitality_facilities_4'); ?>

        </span>

        <div class="mb-2 mt-3">
            <h4 class="text-center"><b><?= lang('hospitality_facilities_title_2'); ?></b></h2>
                <div class="bar"></div>
        </div>
        <span>
            <ul>
                <li><?= lang('hospitality_eligibility_1'); ?></li>
                <li><?= lang('hospitality_eligibility_2'); ?></li>
                <li><?= lang('hospitality_eligibility_3'); ?></li>
                <li><?= lang('hospitality_eligibility_4'); ?></li>
                <li><?= lang('hospitality_eligibility_5'); ?></li>
                <li><?= lang('hospitality_eligibility_6'); ?></li>
            </ul>
        </span>

        <div class="mb-2 mt-3">
            <h4 class="text-center"><b><?= lang('hospitality_booking_title_3'); ?></b></h2>
                <div class="bar"></div>
        </div>
        <span>
            <ul>
                <li><?= lang('hospitality_booking_1'); ?></li>
                <li><?= lang('hospitality_booking_2'); ?></li>
                <li><?= lang('hospitality_booking_3'); ?></li>
                <li><?= lang('hospitality_booking_4'); ?></li>
            </ul>
        </span>
        <div class="d-flex justify-content-center mt-2">
            <a href="#" target="_blank" class="btn btn-primary btn-lg">
                <?= lang('book_now'); ?>
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