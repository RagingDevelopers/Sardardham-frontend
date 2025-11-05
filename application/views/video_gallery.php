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

    .card {
        list-style: none;
        position: relative;
    }

    /* .card:before {
        content: '';
        display: block;
        padding-bottom: 150%;
        width: 100%;
    } */

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

    .card:hover .card__background {
        transform: scale(1.05) translateZ(0);
    }

    .card-grid:hover>.card:not(:hover) .card__background {
        filter: brightness(0.9) saturate(0) contrast(0.9) blur(4px);
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

    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
    }
</style>

<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;">
    <span class=""><?= lang('video_gallery') ?>
    </span>
</div>

<div class="container pt-2">
    <ul class="nav nav-pills mb-3 gap-3 justify-content-center" id="pills-tab" role="tablist">
        <?php for ($x = 0; $x < count($year); $x++) { ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link year year-btn <?php if ($x == 0) {
                    echo 'active';
                } ?>" data-year="<?= $year[$x]['year']; ?>" id="pill-<?= $year[$x]['year']; ?>"
                    data-id="<?= $year[$x]['year']; ?>" data-bs-toggle="pill"
                    data-bs-target="#tab-<?= $year[$x]['year']; ?>" type="button" role="tab"
                    aria-controls="<?= $year[$x]['year']; ?>" aria-selected="<?php if ($x == 0) {
                          echo 'true';
                      } else {
                          echo 'false';
                      } ?>"><?= $year[$x]['year']; ?></button>
            </li>
        <?php } ?>
    </ul>
    <ul class="nav nav-pills mb-3 gap-3 justify-content-center" id="category-tabs"></ul>
    <div class="gallery-image-ajax"></div>
</div>

<script>
    $(".year-btn").click(function () {
        var currentBtn = $(this);
        var selectedYear = currentBtn.data("year");

        $(".year-btn").removeClass("active");
        currentBtn.addClass("active");

        // Loader optional
        $(".image-loader").removeClass("d-none");

        $.ajax({
            url: "<?= base_url('gallery/get_categories_by_year') ?>",
            type: "POST",
            data: { year: selectedYear },
            dataType: "json",
            success: function (response) {
                let categoryHtml = '';
                if (response.length > 0) {
                    response.forEach((cat, index) => {
                        categoryHtml += `
                        <li class="nav-item" role="presentation">
                            <button class="nav-link category-btn ${index === 0 ? 'active' : ''}" data-id="${cat.id}">
                                ${cat.name}
                            </button>
                        </li>`;
                    });
                    $("#category-tabs").html(categoryHtml);

                    // Trigger first category load
                    $(".category-btn").eq(0).click();
                } else {
                    $("#category-tabs").html('<li>No categories found</li>');
                }
            }
        });
    });
    $(".year-btn").eq(0).click();

    $(document).on("click", ".category-btn", function () {
        var categoryId = $(this).data("id");
        var id = '#tab-' + $(this).data('id');

        $(".category-btn").removeClass("active");
        $(this).addClass("active");

        $.ajax({
            url: "<?= base_url('gallery/get_documentaries_by_category') ?>",
            type: "POST",
            data: { category_id: categoryId },
            success: function (data) {
                // console.log(data);
                $(".gallery-image-ajax").html(data);
                AOS.init();
                $($(id).find('ul').children('li')[0]).trigger('click');
            }
        });
    });
</script>