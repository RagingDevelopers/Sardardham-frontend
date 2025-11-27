<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-2">
        <h2><b><?= lang('higher_education_title'); ?></b></h2>
        <h3><b><?= lang('higher_education_sub_title_1'); ?></b></h3>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('higher_educatino_sub_title_2'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <span>
            <?= lang('higher_education_1'); ?>
        </span>
        <span>
            <?= lang('higher_education_2'); ?>
        </span>
        <span>
            <?= lang('higher_education_3'); ?>
        </span>
    </div>

    <div class="mt-1 mb-4">
        <div class="project text-center mt-5">
            <div class="image-container mt-3">
                <img src="/assets/General.jpg" class="img-fluid rounded shadow project-img"
                    alt="Image-not-found">
            </div>
        </div>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <div class="text-center mb-2 mt-3">
            <h2><b><?= lang('higher_education_title_4'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <?= lang('higher_education_4'); ?>
        </span>

        <div class="row">
            <div class="col-md-6">
                <span>
                    <ul>
                        <li><?= lang('higher_education_scope_1'); ?></li>
                        <li><?= lang('higher_education_scope_2'); ?></li>
                        <li><?= lang('higher_education_scope_3'); ?></li>
                        <li><?= lang('higher_education_scope_4'); ?></li>
                        <li><?= lang('higher_education_scope_5'); ?></li>
                        <li><?= lang('higher_education_scope_6'); ?></li>
                    </ul>
                </span>
            </div>
            <div class="col-md-6">
                <span>
                    <ul>
                        <li><?= lang('higher_education_scope_7'); ?></li>
                        <li><?= lang('higher_education_scope_8'); ?></li>
                        <li><?= lang('higher_education_scope_9'); ?></li>
                        <li><?= lang('higher_education_scope_10'); ?></li>
                        <li><?= lang('higher_education_scope_11'); ?></li>
                    </ul>
                </span>
            </div>
        </div>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mt-2">
        <div class="text-center mb-2 mt-3">
            <h2><b><?= lang('higher_education_title_5'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <ul>
                <li><?= lang('higher_education_process_1'); ?></li>
                <li><?= lang('higher_education_process_2'); ?></li>
                <li><?= lang('higher_education_process_3'); ?></li>
                <li><?= lang('higher_education_process_4'); ?></li>
            </ul>
        </span>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mt-2">
        <div class="text-center mb-2 mt-3">
            <h2><b><?= lang('higher_education_title_6'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <ul>
                <li><?= lang('higher_education_selection_1'); ?></li>
                <li><?= lang('higher_education_selection_2'); ?></li>
                <li><?= lang('higher_education_selection_3'); ?></li>
                <li><?= lang('higher_education_selection_4'); ?></li>
                <li><?= lang('higher_education_selection_5'); ?></li>
            </ul>
        </span>
        <div class="d-flex justify-content-center flex-wrap gap-3 mt-3">
            <a href="#" target="_blank" class="btn btn-primary btn-lg">
                <?= lang('stay_updated'); ?>
            </a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg">
                <?= lang('apply_here'); ?>
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