<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show  active" id="tab-<?= $year ?>" data-id="5" role="tabpanel"
        aria-labelledby="pill-<?= $year; ?>">
        <section class="hero-section">
            <div class="card-grid">
                <div class="portfolio-menu mt-2 mb-4">
                    <ul>
                        <?php for ($x = 0; $x < count($magazines); $x++) { ?>
                            <li class="btn btn-outline-dark gallery m-1 <?php if ($x == 0) {
                                echo 'active onclick';
                            } ?>"
                                data-id="<?= $magazines[$x]['id']; ?>" data-filter=".id-<?= $magazines[$x]['id']; ?>">
                                <?= $magazines[$x]['title']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="col-md-12 p-3 hide">
    <div class="row">
        <div class="col-md-11 p-0">
            <span class="full_name p-3 text-white h4 fw-bold"></span>
        </div>
        <div class="col-md-1 p-0">
            <a class="pdf_link btn text-white" href="" target="_blank"
                style="background:linear-gradient(135deg,#ee0979 0,#ff6a00 100%);">View Pdf</a>
        </div>
    </div>
</div>

<?php if ($c = count($gallery_img) > 0) { ?>
    <div class="portfolio-item row">
        <?php for ($x = 0; $x < count($gallery_img); $x++) { ?>
            <div class="id-<?= $gallery_img[$x]['gallery_id']; ?> col-lg-3 col-md-4 col-6 col-sm-6 col-12 p-2 ">
                <a href="<?= base_url() ?>upload/<?= $gallery_img[$x]['photo']; ?>" class="fancylight popup-btn"
                    data-fancybox-group="light">
                    <img class="img-fluid mage-popup-no-margins gallery-img"
                        src="<?= base_url() ?>upload/<?= $gallery_img[$x]['photo']; ?>" alt="img"
                        style="width:auto; height:200px;border-radius: 9px;">
                </a>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="col-12 text-center my-5">
        <div class="no-available alert">
            <h4>No Images Available in the Gallery For Selected Year</h4>
            <p>We’re currently updating our gallery. Please check back soon to explore new photos and events.</p>
            <a href="/" class="btn-back-home">Return to Home</a>
        </div>
    </div>

<?php } ?>