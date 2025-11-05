  <style>

        /* Inner page section */
        .inner-page {
            background-color: #E1E1E1;
            color: #21559B;
            font-weight: 600;
            padding: 2rem;
            text-align: center;
            border-bottom: 3px solid #3498db;
        }

        .inner-page .contents {
            display: contents !important;
        }

        /* Header styling */
        .philanthropist-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .philanthropist-header h2 {
            font-size: 2.75rem;
            color: #2c3e50;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .philanthropist-header .bar {
            width: 80px;
            height: 4px;
            margin: 12px auto;s
        }

        /* Philanthropist section */
        .philanthropist-section {
            background-color: #ffffff;
            padding: 40px 0;
        }

        /* Philanthropist item card styling */
        .philanthropist-item {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            transition: box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .philanthropist-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Image styling */
        .philanthropist-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        /* Name styling */
        .philanthropist-item h5 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
        }

        /* Text styling for details */
        .philanthropist-item p {
            font-size: 1rem;
            color: #34495e;
            margin: 6px 0;
            line-height: 1.4;
        }

        .philanthropist-item p strong {
            color: #2c3e50;
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
                padding: 15px;
            }

            .philanthropist-item img {
                height: 140px;
            }
        }
    </style>
<div class="inner-page">
        <span class="contents"><?= lang('philanthropists') ?></span>
    </div>

    <!-- Main content starts here -->
    <div class="container pt-5">
        <!-- Philanthropist Header -->
        <div class="philanthropist-header">
            <h2><b><?= lang('philanthropists') ?></b></h2>
            <div class="bar"></div>
        </div>

        <!-- Philanthropist Section -->
        <div class="philanthropist-section">
            <div class="container pt-4">
                <section id="philanthropists">
                    <div class="row">
                        <?php foreach ($philanthropists as $philanthropist): ?>
                            <div class="col-lg-3 col-md-4 col-6 col-sm-6 p-2">
                                <!-- Philanthropist Item -->
                                <div class="philanthropist-item">
                                    <!-- Image -->
                                    <a href="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" class="fancylight popup-btn">
                                        <img src="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" alt="<?= $philanthropist['name']; ?>">
                                    </a>

                                    <!-- Name -->
                                    <h5><?= $philanthropist['name']; ?></h5>

                                    <!-- Company -->
                                    <p><strong></strong> <?= $philanthropist['company']; ?></p>

                                    <!-- City -->
                                    <p><strong></strong> <?= $philanthropist['city']; ?></p>

                                    <!-- Category -->
                                    <p><strong></strong> <?= $philanthropist['category']; ?></p>

                                    <!-- Zone -->
                                    <p><strong></strong> <?= $philanthropist['zone']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>