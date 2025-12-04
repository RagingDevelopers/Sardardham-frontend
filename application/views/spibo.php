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
<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-2">
        <h2><b><?= lang('spibo_title'); ?></b></h2>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('spibo_tagline'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <span>
            <?= lang('spibo_overview_1'); ?>
        </span>
        <span>
            <?= lang('spibo_overview_2'); ?>
        </span>
        <span>
            <?= lang('spibo_overview_3'); ?>
        </span>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <div class="text-center mb-2 mt-3">
            <h2><b><?= lang('spibo_sub_title_1'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <?= lang('spibo_overview_4'); ?>
        </span>
        <span>
            <?= lang('spibo_overview_5'); ?>
        </span>
        <ul>
            <li><?= lang('spibo_feature_1'); ?></li>
            <li><?= lang('spibo_feature_2'); ?></li>
            <li><?= lang('spibo_feature_3'); ?></li>
        </ul>
        <span>
            <?= lang('spibo_overview_6'); ?>
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
            <h2><b><?= lang('spibo_sub_title_2'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <?= lang('spibo_overview_7'); ?>
        </span>
        <br>
        <span>
            <b>&bull; <?= lang('spibo_objective_1'); ?></b>
            <br>
            <?= lang('spibo_sub_objective_1'); ?>
        </span>
        <br>
        <span>
            <b>&bull; <?= lang('spibo_objective_2'); ?></b>
            <br>
            <?= lang('spibo_sub_objective_2'); ?>
        </span>
        <br>
        <span>
            <b>&bull; <?= lang('spibo_objective_3'); ?></b>
            <br>
            <?= lang('spibo_sub_objective_3'); ?>
        </span>
        <br>
        <span>
            <b>&bull; <?= lang('spibo_objective_4'); ?></b>
            <br>
            <?= lang('spibo_sub_objective_4'); ?>
        </span>
        <br>
        <span>
            <b>&bull; <?= lang('spibo_objective_5'); ?></b>
            <br>
            <?= lang('spibo_sub_objective_5'); ?>
        </span>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <div class="text-center mb-2 mt-3">
            <h2><b><?= lang('spibo_sub_title_3'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <?= lang('spibo_overview_8'); ?>
        </span>
        <span>
            <?= lang('spibo_difference_1'); ?>
        </span>
        <span>
            <?= lang('spibo_difference_2'); ?>
        </span>
        <br>
        <span>
            <b><?= lang('spibo_difference_3'); ?></b>
        </span>
        <br>
        <span>
            <?= lang('spibo_difference_4'); ?>
        </span>
        <span>
            <?= lang('spibo_difference_5'); ?>
        </span>        
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <div class="text-center mb-2 mt-3">
            <h2><b><?= lang('spibo_sub_title_4'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <?= lang('spibo_overview_9'); ?>
        </span>
        <div class="row">
            <div class="col-md-6">
                <span>
                    <b><?= lang('spibo_benefit_1'); ?></b>
                </span><br>
                <span>
                    <ul>
                        <li><?= lang('spibo_benefit_2'); ?></li>
                        <li><?= lang('spibo_benefit_3'); ?></li>
                        <li><?= lang('spibo_benefit_4'); ?></li>
                        <li><?= lang('spibo_benefit_5'); ?></li>
                        <li><?= lang('spibo_benefit_6'); ?></li>
                    </ul>
                </span>
            </div>
            <div class="col-md-6">
                <span>
                    <b><?= lang('spibo_benefit_7'); ?></b>
                </span><br>
                <span>
                    <ul>
                        <li><?= lang('spibo_benefit_8'); ?></li>
                        <li><?= lang('spibo_benefit_9'); ?></li>
                        <li><?= lang('spibo_benefit_10'); ?></li>
                        <li><?= lang('spibo_benefit_11'); ?></li>
                        <li><?= lang('spibo_benefit_12'); ?></li>
                    </ul>
                </span>
            </div>
        </div>        
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
            <h2><b><?= lang('spibo_sub_title_5'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <?= lang('spibo_overview_10'); ?>
        </span><br>
        <span>
            <ul>
                <li><?= lang('spibo_join_1'); ?></li>
                <li><?= lang('spibo_join_2'); ?></li>
                <li><?= lang('spibo_join_3'); ?></li>
                <li><?= lang('spibo_join_4'); ?></li>
            </ul>
        </span>
        <div class="d-flex justify-content-center flex-wrap gap-3 mt-3">
            <a href="https://www.spibo.in/" target="_blank" class="btn btn-primary btn-lg">
                www.spibo.in
            </a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg">
                SPIBO-Android App.
            </a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg">
                SPIBO-Apple App.
            </a>
        </div>
    </div>
</section>