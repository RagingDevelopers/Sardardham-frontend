<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-1">
        <h2><b><?= lang('youth_organization_title'); ?></b></h2>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('youth_organization_tagline'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-1 mt-2">
        <span>
            <?= lang('youth_overview_1'); ?>
        </span>
        <span>
            <?= lang('youth_overview_2'); ?>
        </span>
        <span>
            <?= lang('youth_overview_3'); ?>
        </span>
        <span>
            <?= lang('youth_overview_4'); ?>
        </span>
    </div>


    <div class="mt-1 mb-4">
        <div class="project text-center mt-5">
            <div class="image-container mt-3">
                <img src="/upload/20241001112412036.jpg" class="img-fluid rounded shadow project-img"
                    alt="Image-not-found">
            </div>
        </div>
    </div>

    <div class="content-box bg-light p-4 rounded-3 shadow-sm mx-auto mb-2 mt-4 text-center">
        <h3><b><?= lang('who_can_join'); ?></b></h3>
        <div class="bar mx-auto"></div>
        <span>
            <?= lang('youth_descri_1') ?>
        </span>
        <span>
            <?= lang('youth_descri_2') ?> <br>
            <?= lang('youth_descri_3') ?>
        </span>
        <div class="row">
            <div class="col-md-12">
                <a href="https://sardardham.org/youth/" target="_blank" class="btn btn-primary btn-sm mt-2">
                    👉 <?= lang('become_a_part'); ?>
                </a>
            </div>
        </div>
    </div>


</section>

<style>
    #building-projects {
        scroll-margin-top: 80px;
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

    .content-box h3 {
        font-size: 26px;
        /* margin-bottom: 15px; */
    }

    .content-box .btn-primary {
        /* background-color: #007bff; */
        border: none;
        /* border-radius: 30px; */
        padding: 7px 10px;
        font-size: 18px;
        /* transition: transform 0.3s ease, background-color 0.3s ease; */
    }

    .content-box .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }
</style>