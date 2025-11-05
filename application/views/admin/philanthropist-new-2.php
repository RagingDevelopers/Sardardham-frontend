<style>
    /* Inner page section */
    .inner-page {
        background-color: #f8f9fa;
        color: #1a3c6d;
        font-weight: 700;
        font-size: 2.5rem;
        padding: 2.5rem;
        text-align: center;
        border-bottom: 4px solid #1a73e8;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .inner-page .contents {
        display: contents !important;
    }

    /* Header styling */
    .philanthropist-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .philanthropist-header h2 {
        font-size: 3rem;
        color: #1a3c6d;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .philanthropist-header .bar {
        width: 100px;
        height: 5px;
        background-color: #1a73e8;
        margin: 15px auto;
        border-radius: 2px;
    }

    /* Philanthropist section */
    .philanthropist-section {
        background-color: #f1f4f8;
        padding: 50px 0;
    }

    /* Philanthropist item card styling (horizontal layout) */
    .philanthropist-item {
        background-color: #ffffff;
        border: 1px solid #dfe4ea;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        align-items: center;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
    }

    .philanthropist-item:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        transform: translateY(-4px);
    }

    /* Image styling */
    .philanthropist-item img {
        width: 220px;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 20px;
        border: 1px solid #e9ecef;
    }

    /* Content container for text */
    .philanthropist-item .content {
        flex: 1;
        text-align: left;
    }

    /* Name styling */
    .philanthropist-item h5 {
        font-size: 2rem;
        font-weight: 700;
        color: #1a3c6d;
        margin-bottom: 12px;
        line-height: 1.2;
    }

    /* Text styling for details */
    .philanthropist-item p {
        font-size: 1.1rem;
        color: #2d3748;
        margin: 6px 0;
        line-height: 1.5;
    }

    .philanthropist-item p strong {
        color: #1a3c6d;
        font-weight: 600;
    }

    /* Responsive layout for smaller screens */
    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 2rem;
            padding: 1.75rem !important;
        }

        .philanthropist-header h2 {
            font-size: 2.25rem;
        }

        .philanthropist-item {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 15px;
        }

        .philanthropist-item img {
            width: 100%;
            height: 160px;
            margin-right: 0;
            margin-bottom: 15px;
        }

        .philanthropist-item .content {
            text-align: center;
        }

        .philanthropist-item h5 {
            font-size: 1.75rem;
        }

        .philanthropist-item p {
            font-size: 1rem;
        }
    }
</style>

<!-- Inner Page Header Section -->
<div class="inner-page">
    <span class="contents"><?= lang('philanthropists') ?></span>
</div>

<!-- Main content starts here -->
<div class="container pt-5">
    <!-- Philanthropist Header -->
    <div class="philanthropist-header">
        <h2><b><?= lang('philanthropists') ?></b></h2>
        <div class="bar"></Ѕdiv>
    </div>

    <!-- Philanthropist Section -->
    <div class="philanthropist-section">
        <div class="container pt-4">
            <section id="philanthropists">
                <div class="row">
                    <?php foreach ($philanthropists as $philanthropist): ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <!-- Philanthropist Item -->
                            <div class="philanthropist-item">
                                <!-- Image -->
                                <a href="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" class="fancylight popup-btn">
                                    <img src="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" alt="<?= $philanthropist['name']; ?>">
                                </a>
                                <!-- Content -->
                                <div class="content">
                                    <!-- Name -->
                                    <h5><?= $philanthropist['name']; ?></h5>
                                    <!-- Company -->
                                    <p><strong>Company:</strong> <?= $philanthropist['company']; ?></p>
                                    <!-- City -->
                                    <p><strong>City:</strong> <?= $philanthropist['city']; ?></p>
                                    <!-- Category -->
                                    <p><strong>Category:</strong> <?= $philanthropist['category']; ?></p>
                                    <!-- Zone -->
                                    <p><strong>Zone:</strong> <?= $philanthropist['zone']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
</div>