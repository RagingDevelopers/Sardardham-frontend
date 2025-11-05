<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

<style>
    body {
        margin: 0;
        padding: 0;
    }

    /* .container{
    width:90%
    margin:10px auto;
} */
    .portfolio-menu {
        text-align: center;
    }

    .portfolio-menu ul li {
        /*display:inline-block;*/
        margin: 0;
        list-style: none;
        padding: 10px 15px;
        cursor: pointer;
        -webkit-transition: all 05s ease;
        -moz-transition: all 05s ease;
        -ms-transition: all 05s ease;
        -o-transition: all 05s ease;
        transition: all .5s ease;
    }

    /* .portfolio-item{ */
    /*width:100%;*/
    /* } */
    .portfolio-item .item {
        /*width:303px;*/
        float: left;
        margin-bottom: 10px;
    }

    .btn-outline-dark:not(:disabled):not(.disabled).active,
    .btn-outline-dark:not(:disabled):not(.disabled):active,
    .show>.btn-outline-dark.dropdown-toggle {
        background: -webkit-gradient(linear, left top, right top, from(#0e9ea8), to(#43e794));
        background: linear-gradient(90deg, #0e9ea8 0, #43e794 100%);
        border-radius: 4px;
        -webkit-transition: .5s;
        transition: .5s
    }

    .btn-outline-dark:hover {
        background: linear-gradient(135deg, #ee0979 0, #ff6a00 100%);
    }

    .full_name {
        background: -webkit-gradient(linear, left top, right top, from(#0e9ea8), to(#43e794));
        background: linear-gradient(90deg, #0e9ea8 0, #43e794 100%);
        border-radius: 4px;
        -webkit-transition: .5s;
        transition: .5s
    }

    .full_name:hover {
        background: linear-gradient(135deg, #ee0979 0, #ff6a00 100%);
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

    .mfp-with-zoom .mfp-container,
    .mfp-with-zoom.mfp-bg {
        opacity: 0;
        -webkit-backface-visibility: hidden;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }

    .mfp-with-zoom.mfp-ready .mfp-container {
        opacity: 1;
    }

    .mfp-with-zoom.mfp-ready.mfp-bg {
        opacity: 0.8;
    }

    /* Gallery Image Styling */
    .gallery-img {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        /* Smooth transition on hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        /* Initial light shadow */
        border-radius: 10px;
        /* Rounded corners */
        width: 100%;
        height: 200px;
    }

    /* Hover Effect - Smooth Zoom with Shadow */
    .gallery-img:hover {
        transform: scale(1.08);
        /* Slight zoom on hover */
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        /* Enhanced shadow on hover */
    }

    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
    }
</style>
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
        class=""><?= lang("gallery") ?></span>
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
    <div class="gallery-image-ajax">
    </div>
</div>
<script>
    $(".hide").hide();
    if ($('.onclick').length > 0) {
        var id = $('.onclick').data('id');
        $.ajax({
            url: "<?= base_url('gallery/gallery'); ?>",
            type: 'GET',
            data: ({
                id: id
            }),
            success: function (response) {
                var json = $.parseJSON(response);
                $(".hide").show();
                console.log(json.pdf);
                $('.full_name').html(json.full_title);
                $(".pdf_link").attr("href", "<?= base_url('upload/'); ?>" + json.pdf)
            }
        });
    }



    $(".year-btn").click(function () {
        var currentBtn = $(this);
        var { year } = currentBtn.data();
        var loader = $(".image-loader");

        loader.removeClass("d-none");

        var id = '#tab-' + $(this).data('id');
        $.ajax({
            url: "<?= base_url('gallery/getGalleryImagesByYear'); ?>",
            type: 'GET',
            data: ({
                year,
            }),
            success: function (response) {
                $('.gallery-image-ajax').html(response);


                var popup_btn = $('.popup-btn');
                popup_btn.magnificPopup({
                    type: 'image',
                    gallery: {
                        enabled: true
                    },
                    mainClass: 'mfp-no-margins mfp-with-zoom',
                    image: {
                        verticalFit: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300 // don't foget to change the duration also in CSS
                    }
                });





                $($(id).find('ul').children('li')[0]).trigger('click');
            }
        }).always(() => {
            loader.addClass("d-none");
        });
    });
    $(".year-btn").eq(0).click();

    $(document).on("click", '.portfolio-menu ul li', function () {
        var id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('gallery/gallery'); ?>",
            type: 'GET',
            data: ({
                id: id
            }),
            success: function (response) {
                var json = $.parseJSON(response);
                $(".hide").show();
                console.log(json.pdf);
                $('.full_name').html(json.full_title);
                $(".pdf_link").attr("href", "<?= base_url('upload/'); ?>" + json.pdf)
            }
        });


        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter: selector
        });



        return false;
    });
    $(document).ready(function () {
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>