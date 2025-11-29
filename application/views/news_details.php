<?php
/**
 * News / Event Details (inner view)
 *
 * Vars:
 * $event
 * $other_news
 */

// IMAGE
$image_url = !empty($event['photo'])
    ? base_url('upload/' . $event['photo'])
    : base_url('assets/img/placeholder.jpg');

// PDF: check on server path, not URL
$pdf_path       = (!empty($event['pdf'])) ? FCPATH . 'upload/' . $event['pdf'] : null;
$pdf_public_url = (!empty($event['pdf'])) ? base_url('upload/' . $event['pdf']) : null;
$has_pdf_file   = ($pdf_path && file_exists($pdf_path));

// DATE
$event_date = !empty($event['event_date'])
    ? date('d M Y', strtotime($event['event_date']))
    : (!empty($event['created_at']) ? date('d M Y', strtotime($event['created_at'])) : '');
?>

<style>
    /* --- Page top tag --- */
    .inner-page {
        padding: 1rem 1.3rem;
        font-size: 26px;
        background: #f2f4f7;
        color: #21559B;
        border-bottom: 1px solid rgba(0,0,0,0.03);
    }


    .news-details-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0px 8px 24px rgba(15, 23, 42, 0.05);
        padding: 1.5rem 1.6rem;
    }

    .news-img {
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        border: 1px solid rgba(0,0,0,0.03);
    }

    .news-img img {
        width: 100%;
        display: block;
    }

    .news-title {
        color: #101828;
        font-weight: 700;
        letter-spacing: -.02em;
        line-height: 1.2;
    }

    .news-meta {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem .75rem;
        align-items: center;
        font-size: 0.85rem;
        color: #667085;
    }

    .news-meta-badge {
        display: inline-block;
        background: rgba(33, 85, 155, 0.08);
        color: #21559B;
        padding: .15rem .5rem;
        border-radius: 999px;
        font-size: .7rem;
        font-weight: 500;
    }

    .news-body {
        line-height: 1.65;
        color: #475467;
    }

    .btn-main {
        background: #21559B;
        border: 1px solid #21559B;
        color: #fff !important;
        border-radius: 999px;
        padding: .45rem 1.15rem;
        font-weight: 500;
        transition: .2s ease;
    }

    .btn-main:hover {
        filter: brightness(0.91);
        color: #fff !important;
    }

    .btn-soft {
        background: #fff;
        border: 1px solid rgba(33, 85, 155, .35);
        color: #21559B !important;
        border-radius: 999px;
        padding: .45rem 1.15rem;
        font-weight: 500;
        transition: .2s ease;
    }

    .btn-soft:hover {
        background: rgba(33, 85, 155, .06);
    }

    /* --- Other news cards (your original style) --- */
    .card1 {
        margin: 10px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        width: auto;
        transition: all 0.4s linear 0s;
    }

    .card1:hover {
        transform: scale(1.05);
        border-color: #1369ce;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.6s ease;
    }

    .card1-header img {
        width: 100%;
        height: 397px;
        object-fit: cover;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #0e9ea8 0%, #43e794 100%);
        border: none;
        color: #fff !important;
        border-radius: 4px;
    }

    @media (max-width: 991.98px) {
        .news-details-card {
            padding: 1.25rem 1.1rem;
        }
    }

    @media (max-width: 768px) {
        .card1-header img {
            height: 250px;
        }
    }
</style>

<!-- PAGE TITLE / SUBBAR -->
<div class="inner-page fw-bold text-center">
    <span><?= lang('news_media') ?></span>
</div>

<div class="container py-5 news-details-wrap">
    <div class="section-title" style="margin-bottom: 20px !important;">
  <h2><?= lang('news_media') ?></h2>
  <div class="bar"></div>
  <!-- <p>Our ideology defines the principles that guide our actions and inspire our vision.</p> -->
</div>
    <div class="news-details-card mb-5">


        <div class="row g-4 align-items-start">
            <!-- image -->
            <div class="col-md-5">
                <div class="news-img shadow-sm">
                    <img src="<?= $image_url; ?>" alt="<?= html_escape($event['title']); ?>" class="img-fluid">
                </div>
            </div>

            <!-- content -->
            <div class="col-md-7">
                <h2 class="news-title mb-3"><?= html_escape($event['title']); ?></h2>

                <!-- <div class="news-meta mb-3">
                    <?php if ($event_date): ?>
                        <span><?= $event_date; ?></span>
                    <?php endif; ?>
                    <?php if (!empty($event['type'])): ?>
                        <span class="news-meta-badge"><?= ucfirst($event['type']); ?></span>
                    <?php endif; ?>
                </div> -->

                <div class="news-body mb-4">
                    <?= !empty($event['description'])
                        ? $event['description']
                        : '<p>No description available.</p>'; ?>
                </div>

                <?php
                // URL button title (for redirect_url) with fallback
                $url_button_title = !empty($event['redirect_url_title'])
                    ? $event['redirect_url_title']
                    : (lang('click_to_view') ?: 'Click to View');

                // PDF/Image button title (for pdf/image) with fallback
                $pdf_button_title = !empty($event['button_title'])
                    ? $event['button_title']
                    : (lang('view_pdf') ?: 'View PDF');
                ?>

                <div class="d-flex flex-wrap gap-2">
                    <?php if (!empty($event['redirect_url'])): ?>
                        <a href="<?= $event['redirect_url']; ?>" target="_blank" class="btn-main">
                            <?= html_escape($url_button_title); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($has_pdf_file): ?>
                        <a href="<?= $pdf_public_url; ?>" target="_blank" class="btn-soft">
                            <?= html_escape($pdf_button_title); ?>
                        </a>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </div>

    <!-- OTHER NEWS -->
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="color:#21559B;">Other News / Events</h5>
            <a href="<?= base_url('update/news'); ?>" class="btn btn-sm btn-link text-decoration-none">
                View All
            </a>
        </div>
    </div>

    <div class="row">
        <?php if (!empty($other_news)): ?>
            <?php foreach ($other_news as $x => $item): ?>
                <div class="col-md-4 mb-4"
                     data-aos="<?php echo $x % 3 === 0 ? 'fade-up-right' : ($x % 3 === 1 ? 'fade-up' : 'fade-up-left'); ?>">
                    <div class="card1 shadow-sm border-0 h-100" style="border-radius: 10px;">
                        <div class="card1-header position-relative">
                            <img loading="lazy"
                                 src="<?= base_url('upload/' . $item['photo']); ?>"
                                 alt="<?= html_escape($item['title']); ?>"
                                 class="img-fluid rounded-top">
                        </div>
                        <div class="card1-body p-3">
                            <!-- optional date -->
                            <p class="mb-2 text-muted" style="font-size: 0.8rem;">
                                <?=
                                !empty($item['event_date'])
                                    ? date('d M Y', strtotime($item['event_date']))
                                    : (!empty($item['created_at']) ? date('d M Y', strtotime($item['created_at'])) : '')
                                ?>
                            </p>
                            <?php
                            $buttonText     = $item['title'];
                            $buttonStyle    = 'btn m-0 text-white w-100';
                            $buttonGradient = 'background:linear-gradient(90deg,#0e9ea8 0,#43e794 100%);border-radius:4px;transition:.5s;';
                            $buttonURL      = base_url('media/news-details/' . rawurlencode($item['slug']));
                            ?>
                            <a href="<?= $buttonURL; ?>" class="<?= $buttonStyle ?>" style="<?= $buttonGradient ?>">
                                <?= $buttonText; ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-light border text-center">
                    No other news/events right now.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    $(function () {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 400,
                easing: 'ease-in-out',
                delay: 70,
            });
        }
    });
</script>
