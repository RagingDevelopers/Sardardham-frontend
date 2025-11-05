<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="tab-<?= $category; ?>" role="tabpanel"
        aria-labelledby="pill-<?= $category; ?>">
        <section class="hero-section">
            <div class="card-grid">
                <?php
                $documentary = $this->db->order_by("id", "desc")->select(["*", langSelect('title')])->get_where('documentary', array("documentary_category_id" => $category, "status" => "ACTIVE"))->result_array();
                for ($x = 0; $x < count($documentary); $x++) { ?>
                    <a class="card" target="_blank" href="<?= $documentary[$x]['youtube_link']; ?>" data-aos="zoom-out-up">
                        <div class="card__background"
                            style="background-image: url(<?= base_url() ?>upload/<?= $documentary[$x]['photo']; ?>)"></div>
                        <div class="card__content">
                            <h3 class="card__heading"><?= $documentary[$x]['title']; ?></h3>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </section>
    </div>
</div>