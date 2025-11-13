<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-2">
        <h2><b><?= lang('csc_title'); ?></b></h2>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('csc_tagline'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto">
        <span>
            <?= lang('csc_overview_1'); ?>
        </span>
        <span>
            <?= lang('csc_overview_2'); ?>
            <ul>
                <li><?= lang('csc_achievement_1'); ?></li>
                <li><?= lang('csc_achievement_2'); ?></li>
            </ul>
        </span>
        <span>
            <?= lang('csc_overview_3'); ?>
        </span>
    </div>

    <div class="mt-4 content-box mx-auto ">
        <?php
        $images = glob(FCPATH . 'assets/images/goals/csc/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        natsort($images);  // Natural human sorting
        $data['images'] = [];
        foreach ($images as $img) {
            $data['images'][] = base_url('assets/images/goals/csc/' . basename($img));
        }
        ?>
        <?php if (!empty($data['images'])): ?>
            <div id="cscCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0; foreach ($data['images'] as $img): ?>
                        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                            <img src="<?= $img ?>" class="d-block w-100"
                                 alt="<?= lang('csc_image_alt_base') . ' ' . ($i + 1); ?>">
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

    <div class="text-center mt-4 mb-2">
        <h2><b><?= lang('skill_centre_title'); ?></b></h2>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('skill_centre_tagline'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto">
        <span>
            <?= lang('skill_centre_overview_1'); ?>
        </span>
        <span>
            <?= lang('skill_centre_overview_2'); ?>
        </span>
    </div>

    <div class="form-group d-flex justify-content-center mt-4">
        <a href="https://csc.sardardham.org/?utm_source=sardardham.org&utm_medium=our-goals" target="_blank">
            <button class="btn btn-primary">
                <?= lang('csc_button_text'); ?>
            </button>
        </a>
    </div>
</section>

<style>
    /* Section Styling */
    #building-projects {
        scroll-margin-top: 80px;
    }

    #cscCarousel img {
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    #building-projects .caption {
        background-color: #6b1b1b;
        color: #fff !important;
        padding: 8px 15px;
        font-weight: 600;
        border-radius: 6px;
        font-size: 15px;
        display: inline-block;
    }

    #building-projects .highlight-box {
        background: linear-gradient(135deg, #1e4e8c, #296ab4);
        color: #fff !important;
        border-radius: 12px;
        line-height: 1.7;
        font-size: 15.5px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    #building-projects .content span {
        display: block;
        font-size: 17px;
        line-height: 1.8;
        margin-bottom: 8px;
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

    .highlight-box p {
        color: white;
    }
</style>
