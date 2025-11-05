<style>
    .brochure-card {
        width: 100%;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .brochure-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
    }

    .brochure-text {
        background: linear-gradient(to right, #bfc0c2, white);
        color: #0d1473;
        border-radius: 10px;
    }

    .brochure-text:hover {
        background: linear-gradient(to right, #0d1473, #bfc0c2);
        color: white;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background: linear-gradient(135deg, #ee0979 0, #ff6a00 100%);

        padding: 10px 28px;
    }

    .nav-pills .nav-link {
        color: white;
        background: -webkit-gradient(linear, left top, right top, from(#0e9ea8), to(#43e794));
        background: linear-gradient(90deg, #0e9ea8 0, #43e794 100%);
        padding: 10px 28px;
    }

    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
    }
</style>
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
        class=""><?= lang('download') ?></span>
</div>

<div class="container">
    <div class="section-title pt-4 mb-0" data-aos="fade-up">
        <span class="h2"><b><?= lang('download') ?></b></span>
        <div class="bar"></div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5 mt-2" data-aos="fade-up" style="display:none;">
            <!-- Category Tabs (Pills) -->
            <ul class="nav nav-pills mb-3 gap-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pill-all" data-bs-toggle="pill" data-bs-target="#tab-all"
                        type="button" role="tab" aria-controls="tab-all" aria-selected="true">All</button>
                </li>
                <?php for ($x = 0; $x < count($download_category); $x++) { ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link category-btn" data-id="<?= $download_category[$x]['id']; ?>"
                            id="pill-<?= $download_category[$x]['id']; ?>" data-bs-toggle="pill"
                            data-bs-target="#tab-<?= $download_category[$x]['id']; ?>" type="button" role="tab"
                            aria-controls="tab-<?= $download_category[$x]['id']; ?>" aria-selected="false">
                            <?= $download_category[$x]['title']; ?>
                        </button>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <!-- Tab Content for all and individual categories -->
        <div class="tab-content" id="pills-tabContent">
            <!-- Show all brochures by default -->
            <div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="pill-all">
                <div class="row">
                    <?php for ($x = 0; $x < count($download); $x++) { ?>
                        <div class="col-md-6 col-lg-6 col-12 mb-3" data-aos="fade-up">
                            <a href="<?= base_url() ?>upload/<?= $download[$x]['pdf']; ?>" target="_blank"
                                class="brochure-card">
                                <div class="h5 fw-bold text-center p-3 brochure-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-check2 me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z">
                                        </path>
                                    </svg>
                                    <?= $download[$x]['title']; ?>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Individual category brochures -->
            <?php foreach ($download_category as $category) { ?>
                <div class="tab-pane fade" id="tab-<?= $category['id']; ?>" role="tabpanel"
                    aria-labelledby="pill-<?= $category['id']; ?>">
                    <div class="row">
                        <!-- Loop through downloads and show those matching the category -->
                        <?php foreach ($download as $item) {
                            if ($item['download_category_id'] == $category['id']) { ?>
                                <div class="col-md-6 col-lg-6 col-12 mb-3" data-aos="fade-up">
                                    <a href="<?= base_url() ?>upload/<?= $item['pdf']; ?>" target="_blank" class="brochure-card">
                                        <div class="h5 fw-bold text-center p-3 brochure-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                                class="bi bi-check2 me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z">
                                                </path>
                                            </svg>
                                            <?= $item['title']; ?>
                                        </div>
                                    </a>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>