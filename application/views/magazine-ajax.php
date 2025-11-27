<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="tab-<?=$year;?>" role="tabpanel" aria-labelledby="pill-<?=$year;?>">
      <section class="hero-section">
            <div class="card-grid">
                <?php
                $magazine=$this->db->order_by("id", "desc")->select([ "*",langSelect('title')])->get_where('magazine',array(langColumn("year") => $year))->result_array();
                for($x = 0; $x < count($magazine); $x++) { ?>
                <a class="card1" target="_blank" href="<?=base_url()?>upload/<?=$magazine[$x]['pdf'];?>" data-aos="zoom-out-up">
                    <div class="card__background" style="background-image: url(<?=base_url()?>upload/<?=$magazine[$x]['photo'];?>)"></div>
                    <div class="card__content">
                        <h3 class="card__heading"><?=$magazine[$x]['title'];?></h3>
                    </div>
                </a>
                <?php } ?>
            </div>
        </section>
    </div>
</div>
