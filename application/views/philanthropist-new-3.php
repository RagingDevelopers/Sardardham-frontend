<style>
    /* Inner page section (shared) */
    .inner-page {
        background-color: #f5f5f5;
        color: #333;
        font-weight: 600;
        font-size: 2rem;
        padding: 2rem;
        text-align: center;
        border-bottom: 3px solid #4682b4;
    }

    .inner-page .contents {
        display: contents !important;
    }

    /* Header styling (shared) */
    .philanthropist-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .philanthropist-header h2 {
        font-size: 2.5rem;
        color: #333;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .philanthropist-header .bar {
        width: 80px;
        height: 4px;
        margin: 10px auto;
    }

    /* Philanthropist section (shared) */
    .philanthropist-section {
        background-color: #fff;
        padding: 40px 0;
    }

    /* Design 1: Standard Horizontal Card */
    .design-1 .philanthropist-item {
        background-color: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 6px;
        padding: 15px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .design-1 .philanthropist-item img {
        width: 180px;
        height: 150px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 15px;
    }

    .design-1 .philanthropist-item .content {
        flex: 1;
        text-align: left;
    }

    .design-1 .philanthropist-item h5 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
    }

    .design-1 .philanthropist-item p {
        font-size: 1rem;
        color: #444;
        margin: 5px 0;
        line-height: 1.4;
    }

    .design-1 .philanthropist-item p strong {
        color: #333;
        font-weight: 600;
    }

    /* Design 2: Card with Rounded Image and Bordered Text */
    .design-2 .philanthropist-item {
        background-color: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        padding: 20px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .design-2 .philanthropist-item img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 20px;
        border: 2px solid #4682b4;
    }

    .design-2 .philanthropist-item .content {
        flex: 1;
        text-align: left;
        border-left: 2px solid #e5e5e5;
        padding-left: 20px;
    }

    .design-2 .philanthropist-item h5 {
        font-size: 1.9rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
    }

    .design-2 .philanthropist-item p {
        font-size: 1rem;
        color: #444;
        margin: 5px 0;
        line-height: 1.4;
    }

    .design-2 .philanthropist-item p strong {
        color: #333;
        font-weight: 600;
    }

    /* Design 3: Card with Compact Layout and Underlined Name */
    .design-3 .philanthropist-item {
        background-color: #fff;
        border-bottom: 2px solid #4682b4;
        padding: 10px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .design-3 .philanthropist-item img {
        width: 140px;
        height: 120px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 15px;
    }

    .design-3 .philanthropist-item .content {
        flex: 1;
        text-align: left;
    }

    .design-3 .philanthropist-item h5 {
        font-size: 1.7rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        border-bottom: 1px solid #4682b4;
        padding-bottom: 5px;
    }

    .design-3 .philanthropist-item p {
        font-size: 0.95rem;
        color: #444;
        margin: 4px 0;
        line-height: 1.3;
    }

    .design-3 .philanthropist-item p strong {
        color: #333;
        font-weight: 600;
    }

    /* Design 4: Card with Stacked Text and Larger Image */
    .design-4 .philanthropist-item {
        background-color: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 6px;
        padding: 15px;
        display: flex;
        align-items: stretch;
        margin-bottom: 15px;
    }

    .design-4 .philanthropist-item img {
        width: 200px;
        height: 180px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 15px;
    }

    .design-4 .philanthropist-item .content {
        flex: 1;
        text-align: left;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .design-4 .philanthropist-item h5 {
        font-size: 2rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
    }

    .design-4 .philanthropist-item p {
        font-size: 1rem;
        color: #444;
        margin: 6px 0;
        line-height: 1.5;
    }

    .design-4 .philanthropist-item p strong {
        color: #333;
        font-weight: 600;
    }

    /* Design 5: Card with Minimal Border and Centered Text */
    .design-5 .philanthropist-item {
        background-color: #fff;
        padding: 15px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        border-left: 3px solid #4682b4;
    }

    .design-5 .philanthropist-item img {
        width: 160px;
        height: 140px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 15px;
    }

    .design-5 .philanthropist-item .content {
        flex: 1;
        text-align: left;
    }

    .design-5 .philanthropist-item h5 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        text-align: center;
    }

    .design-5 .philanthropist-item p {
        font-size: 1rem;
        color: #444;
        margin: 5px 0;
        line-height: 1.4;
        text-align: center;
    }

    .design-5 .philanthropist-item p strong {
        color: #333;
        font-weight: 600;
    }

    /* Responsive layout for smaller screens */
    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 1.75rem;
            padding: 1.5rem !important;
        }

        .philanthropist-header h2 {
            font-size: 2rem;
        }

        .philanthropist-item {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 12px;
        }

        .philanthropist-item img {
            width: 100%;
            height: 140px;
            margin-right: 0;
            margin-bottom: 12px;
        }

        .philanthropist-item .content {
            text-align: center;
        }

        .philanthropist-item h5 {
            font-size: 1.5rem;
        }

        .philanthropist-item p {
            font-size: 0.95rem;
        }

        .design-2 .philanthropist-item img {
            width: 120px;
            height: 120px;
        }

        .design-4 .philanthropist-item img {
            height: 160px;
        }
    }

    /* Separator for designs */
    .design-separator {
        margin: 40px 0;
        text-align: center;
        font-size: 1.5rem;
        color: #333;
        font-weight: 600;
        border-top: 2px solid #e5e5e5;
        padding-top: 20px;
    }
</style>

<div class="inner-page">
    <span class="contents"><?= lang('philanthropists') ?></span>
</div>

<div class="container pt-5">
    <div class="philanthropist-header">
        <h2><b><?= lang('philanthropists') ?></b></h2>
        <div class="bar"></div>
    </div>
    <div class="design-1">
        <div class="design-separator">Design 1: Standard Horizontal Card</div>
        <div class="philanthropist-section">
            <div class="container pt-4">
                <section id="philanthropists-1">
                    <div class="row">
                        <?php foreach ($philanthropists as $philanthropist): ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                                <div class="philanthropist-item">
                                    <a href="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" class="fancylight popup-btn">
                                        <img src="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" alt="<?= $philanthropist['name']; ?>">
                                    </a>
                                    <div class="content">
                                        <h5><?= $philanthropist['name']; ?></h5>
                                        <p><?= $philanthropist['company']; ?></p>
                                        <p><?= $philanthropist['city']; ?></p>
                                        <p><?= $philanthropist['category']; ?></p>
                                        <p><?= $philanthropist['zone']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="design-2">
        <div class="design-separator">Design 2: Rounded Image and Bordered Text</div>
        <div class="philanthropist-section">
            <div class="container pt-4">
                <section id="philanthropists-2">
                    <div class="row">
                        <?php foreach ($philanthropists as $philanthropist): ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                                <div class="philanthropist-item">
                                    <a href="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" class="fancylight popup-btn">
                                        <img src="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" alt="<?= $philanthropist['name']; ?>">
                                    </a>
                                    <div class="content">
                                        <h5><?= $philanthropist['name']; ?></h5>
                                        <p><?= $philanthropist['company']; ?></p>
                                        <p><?= $philanthropist['city']; ?></p>
                                        <p><?= $philanthropist['category']; ?></p>
                                        <p><?= $philanthropist['zone']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="design-3">
        <div class="design-separator">Design 3: Compact Layout and Underlined Name</div>
        <div class="philanthropist-section">
            <div class="container pt-4">
                <section id="philanthropists-3">
                    <div class="row">
                        <?php foreach ($philanthropists as $philanthropist): ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                                <div class="philanthropist-item">
                                    <a href="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" class="fancylight popup-btn">
                                        <img src="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" alt="<?= $philanthropist['name']; ?>">
                                    </a>
                                    <div class="content">
                                        <h5><?= $philanthropist['name']; ?></h5>
                                        <p><?= $philanthropist['company']; ?></p>
                                        <p><?= $philanthropist['city']; ?></p>
                                        <p><?= $philanthropist['category']; ?></p>
                                        <p><?= $philanthropist['zone']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="design-4">
        <div class="design-separator">Design 4: Stacked Text and Larger Image</div>
        <div class="philanthropist-section">
            <div class="container pt-4">
                <section id="philanthropists-4">
                    <div class="row">
                        <?php foreach ($philanthropists as $philanthropist): ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                                <div class="philanthropist-item">
                                    <a href="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" class="fancylight popup-btn">
                                        <img src="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" alt="<?= $philanthropist['name']; ?>">
                                    </a>
                                    <div class="content">
                                        <h5><?= $philanthropist['name']; ?></h5>
                                        <p><?= $philanthropist['company']; ?></p>
                                        <p><?= $philanthropist['city']; ?></p>
                                        <p><?= $philanthropist['category']; ?></p>
                                        <p><?= $philanthropist['zone']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="design-5">
        <div class="design-separator">Design 5: Minimal Border and Centered Text</div>
        <div class="philanthropist-section">
            <div class="container pt-4">
                <section id="philanthropists-5">
                    <div class="row">
                        <?php foreach ($philanthropists as $philanthropist): ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                                <div class="philanthropist-item">
                                    <a href="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" class="fancylight popup-btn">
                                        <img src="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" alt="<?= $philanthropist['name']; ?>">
                                    </a>
                                    <div class="content">
                                        <h5><?= $philanthropist['name']; ?></h5>
                                        <p><?= $philanthropist['company']; ?></p>
                                        <p><?= $philanthropist['city']; ?></p>
                                        <p><?= $philanthropist['category']; ?></p>
                                        <p><?= $philanthropist['zone']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>