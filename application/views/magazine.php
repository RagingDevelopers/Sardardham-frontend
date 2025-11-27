<style>
  :root {
    --background-dark: #2d3548;
    --text-light: rgba(255, 255, 255, 0.6);
    --text-lighter: rgba(255, 255, 255, 0.9);
    --spacing-s: 8px;
    --spacing-m: 16px;
    --spacing-l: 24px;
    --spacing-xl: 32px;
    --spacing-xxl: 64px;
    --width-container: 1200px;
  }

  .hero-section {
    align-items: flex-start;
    /*background-image: linear-gradient(15deg, #0f4667 0%, #2a6973 150%);*/
    display: flex;
    min-height: auto;
    justify-content: center;
    padding: var(--spacing-xxl) var(--spacing-l);
  }

  .card-grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-column-gap: var(--spacing-l);
    grid-row-gap: var(--spacing-l);
    max-width: var(--width-container);
    width: 100%;
  }

  @media(min-width: 540px) {
    .card-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media(min-width: 960px) {
    .card-grid {
      grid-template-columns: repeat(4, 1fr);
    }
  }

  .card1 {
    list-style: none;
    position: relative;
    border-radius: var(--spacing-l);
    border: 1px solid transparent;



  }

  .card1:before {
    content: '';
    display: block;
    padding-bottom: 150%;
    width: 100%;
  }

  .card__background {
    background-size: cover;
    background-position: center;
    border-radius: var(--spacing-l);
    bottom: 0;
    filter: brightness(0.75) saturate(1.2) contrast(0.85);
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    transform-origin: center;
    trsnsform: scale(1) translateZ(0);
    transition:
      filter 200ms linear,
      transform 200ms linear;
  }


  .card1:hover .card__background {
    transform: scale(1.05) translateZ(0);
  }

  .card-grid:hover>.card:not(:hover) .card__background {
    /*filter: brightness(0.9) saturate(0) contrast(0.9) blur(4px);*/

  }

  .card__content {
    left: 0;
    padding: var(--spacing-l);
    position: absolute;
    top: 80%;
  }

  .card__category {
    color: var(--text-light);
    font-size: 0.9rem;
    margin-bottom: var(--spacing-s);
    text-transform: uppercase;
  }

  .card__heading {
    color: var(--text-lighter);
    font-size: 1.5rem;
    text-shadow: 2px 2px 20px rgba(0, 0, 0, 0.2);
    line-height: 1.4;
    word-spacing: 100vw;
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

  #building-projects {
    scroll-margin-top: 80px;
  }

  .content-box {
    max-width: 90%;
    font-size: 18px;
    line-height: 1.7;
  }
</style>

<!-- <section id="page-title-area">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 m-auto text-center">-->
<!--                <div class="page-title-content text-sm-center text-md-start">-->
<!--                    <h1 class="h2"><?= lang('magazine') ?></h1>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<section id="building-projects" class="pt-20 pb-20">
  <div class="text-center mb-2">
    <h2><b><?= lang('ek_vichar_title'); ?></b></h2>
    <div class="bar mx-auto"></div>
    <p>
      <?= lang('ek_vichar_sub_title_1'); ?>
    </p>
  </div>

  <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
    <span>
      <?= lang('ek_vichar_1'); ?>
    </span>
    <span>
      <?= lang('ek_vichar_2'); ?>
    </span>
    <span>
      <?= lang('ek_vichar_3'); ?>
    </span>
  </div>


</section>
<div class="container content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
  <div class="form-group">
    <p style="color: #111; overflow:hidden;" data-aos="fade-right" data-aos-duration="1000">
      <?= $magazine_content->description ?? "" ?>
    </p>
  </div>
  <ul class="nav nav-pills mb-3 gap-3 justify-content-center" id="pills-tab" role="tablist">
    <?php for ($x = 0; $x < count($year); $x++) { ?>
      <li class="nav-item" role="presentation">
        <button class="nav-link  year-btn <?php if ($x == 0) {
                                            echo 'active';
                                          } ?>" data-year="<?= $year[$x]['year']; ?>" id="pill-<?= $year[$x]['year']; ?>"
          data-id="<?= $year[$x]['year']; ?>" data-bs-toggle="pill" data-bs-target="#tab-<?= $year[$x]['year']; ?>"
          type="button" role="tab" aria-controls="<?= $year[$x]['year']; ?>" aria-selected="<?php if ($x == 0) {
                                                                                              echo 'true';
                                                                                            } else {
                                                                                              echo 'false';
                                                                                            } ?>"><?= $year[$x]['year']; ?></button>
      </li>
    <?php } ?>
  </ul>
  <div class="magazine-ajax">
  </div>
</div>

<script>
  $(".year-btn").click(function() {
    var currentBtn = $(this);
    var {
      year
    } = currentBtn.data();
    var loader = $(".image-loader");

    loader.removeClass("d-none");

    var id = '#tab-' + $(this).data('id');
    $.ajax({
      url: "<?= base_url('update/getMagazinesByYear'); ?>",
      type: 'GET',
      data: ({
        year,
      }),
      success: function(response) {
        $('.magazine-ajax').html(response);
        AOS.init();
        $($(id).find('ul').children('li')[0]).trigger('click');
      }
    }).always(() => {
      loader.addClass("d-none");
    });
  });
  $(".year-btn").eq(0).click();
</script>