<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-1">
        <h2><b><?= lang('gpbo_title'); ?></b></h2>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('gpbo_tagline'); ?>
        </p>
    </div>

    <div class="mt-1 mb-4">
        <div class="project text-center mt-5">
            <div class="image-container mt-3">
                <img src="/assets/images/goals/GPBO.jpg" class="img-fluid rounded shadow project-img"
                    alt="Image-not-found">
            </div>
        </div>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-1 mt-2">
        <span>
            <?= lang('gpbo_overview_1'); ?>
        </span>
        <span>
            <?= lang('gpbo_overview_2'); ?>
        </span>
        <span>
            <?= lang('gpbo_overview_3'); ?>
        </span>
    </div>

    <!-- Go to Website Button -->
    <div class="text-center mt-3">
        <a href="https://www.gpbo.org/" target="_blank" class="btn btn-primary btn-lg rounded-pill shadow">
            <?= lang('go_to_website'); ?>
        </a>
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
</style>