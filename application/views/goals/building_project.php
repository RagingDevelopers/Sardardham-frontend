<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-2">
        <h2><b><?= lang('building_projects'); ?></b></h2>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('building_projects_tagline'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto">
        <span>
            <?= lang('building_projects_overview_1'); ?>
        </span>
        <span>
            <?= lang('building_projects_overview_2'); ?>
        </span>
        <span>
            <?= lang('building_projects_overview_3'); ?>
        </span>
        <span>
            <?= lang('building_projects_overview_4'); ?>
        </span>
    </div>

    <!-- Flagship Projects -->
    <div class="mt-4">
        <div>
            <h3 class="text-center fw-bold"><?= lang('flagship_projects_title'); ?></h3>
            <div class="bar mx-auto"></div>
        </div>

        <!-- Project 1 -->
        <div class="project text-center mt-5">
            <h4 class="caption"><?= lang('flagship_project1_title'); ?></h4>
            <div class="image-container mt-3">
                <img src="/assets/images/goals/Sardardham-Ahmedabad.jpg"
                     class="img-fluid rounded shadow project-img"
                     alt="<?= lang('flagship_project1_alt'); ?>">
            </div>
            <div class="highlight-box text-white p-3 rounded mt-3">
                <p>
                    <?= lang('flagship_project1_desc'); ?>
                </p>
            </div>
        </div>

        <!-- Project 2 -->
        <div class="project text-center mt-5">
            <h4 class="caption"><?= lang('flagship_project2_title'); ?></h4>
            <div class="image-container mt-3">
                <img src="/assets/images/goals/Phase-2 – Girls Hostel, Ahmedabad (₹200 Crores).jpg"
                     class="img-fluid rounded shadow project-img"
                     alt="<?= lang('flagship_project2_alt'); ?>">
            </div>
            <div class="highlight-box text-white p-3 rounded mt-3">
                <p>
                    <?= lang('flagship_project2_desc'); ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Regional Expansion Projects -->
    <div class="mt-4">
        <div>
            <h3 class="text-center fw-bold"><?= lang('regional_projects_title'); ?></h3>
            <div class="bar mx-auto"></div>
        </div>

        <!-- Vadodara -->
        <div class="project text-center mt-5">
            <h4 class="caption"><?= lang('regional_project_vadodara_title'); ?></h4>
            <div class="image-container mt-3">
                <img src="/assets/images/goals/Central Gujarat (Vadodara) – Under Construction (₹150 Crores).jpg"
                     class="img-fluid rounded shadow project-img"
                     alt="<?= lang('regional_project_vadodara_alt'); ?>">
            </div>
            <div class="highlight-box text-white p-3 rounded mt-3">
                <p>
                    <?= lang('regional_project_vadodara_desc'); ?>
                </p>
            </div>
        </div>

        <!-- Surat -->
        <div class="project text-center mt-5">
            <h4 class="caption"><?= lang('regional_project_surat_title'); ?></h4>
            <div class="image-container mt-3">
                <img src="/assets/images/goals/South Gujarat (Surat) Under Construction.jpg"
                     class="img-fluid rounded shadow project-img"
                     alt="<?= lang('regional_project_surat_alt'); ?>">
            </div>
            <div class="highlight-box text-white p-3 rounded mt-3">
                <p>
                    <?= lang('regional_project_surat_desc'); ?>
                </p>
            </div>
        </div>

        <!-- Rajkot -->
        <div class="project text-center mt-5">
            <h4 class="caption"><?= lang('regional_project_rajkot_title'); ?></h4>
            <div class="image-container mt-3">
                <img src="/assets/images/goals/Saurashtra Zone (Rajkot) – Under Construction.jpg"
                     class="img-fluid rounded shadow project-img"
                     alt="<?= lang('regional_project_rajkot_alt'); ?>">
            </div>
            <div class="highlight-box text-white p-3 rounded mt-3">
                <p>
                    <?= lang('regional_project_rajkot_desc'); ?>
                </p>
            </div>
        </div>

        <!-- Mehsana -->
        <div class="project text-center mt-5">
            <h4 class="caption"><?= lang('regional_project_mehsana_title'); ?></h4>
            <div class="image-container mt-3">
                <img src="/assets/images/goals/North Gujarat (Mehsana) – Upcoming.jpg"
                     class="img-fluid rounded shadow project-img"
                     alt="<?= lang('regional_project_mehsana_alt'); ?>">
            </div>
            <div class="highlight-box text-white p-3 rounded mt-3">
                <p>
                    <?= lang('regional_project_mehsana_desc'); ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Established Centres -->
    <div class="mt-4">
        <div class="">
            <h3 class="text-center fw-bold"><?= lang('established_centres_title'); ?></h3>
            <div class="bar mx-auto"></div>
        </div>

        <!-- Bhuj -->
        <div class="project text-center mt-5">
            <h4 class="caption"><?= lang('centre_bhuj_title'); ?></h4>
            <div class="image-container mt-3">
                <img src="/assets/images/goals/Sardardham Bhuj.jpg"
                     class="img-fluid rounded shadow project-img"
                     alt="<?= lang('centre_bhuj_alt'); ?>">
            </div>
            <div class="highlight-box text-white p-3 rounded mt-3">
                <p>
                    <?= lang('centre_bhuj_desc'); ?>
                </p>
            </div>
        </div>

        <!-- Civil Service Delhi -->
        <div class="project text-center mt-5">
            <h4 class="caption"><?= lang('centre_delhi_title'); ?></h4>
            <div class="image-container mt-3">
                <img src="/assets/images/goals/Civil Service delhi.jpg"
                     class="img-fluid rounded shadow project-img"
                     alt="<?= lang('centre_delhi_alt'); ?>">
            </div>
            <div class="highlight-box text-white p-3 rounded mt-3">
                <p>
                    <?= lang('centre_delhi_desc'); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<style>
    /* Section Styling */
    #building-projects {
        scroll-margin-top: 80px;
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
