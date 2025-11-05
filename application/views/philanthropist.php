<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

<style>
    body {
        margin: 0;
        padding: 0;
    }

    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
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

    .portfolio-item {
        /*width:100%;*/
    }

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

    .card11__background {
        transition: all 0.2s linear 0s;
        border: 1px solid transparent;
        border-radius: 12px;
    }

    .card11-grid:hover>.card11:not(:hover) .card11__background {
        filter: brightness(0.9) saturate(0) contrast(0.9) blur(4px);
    }

    .card11:hover .card11__background {
        transform: scale(1.05) translateZ(0);
        border-color: #1369ce;

    }

    .zoom-image {
        display: block;
        width: 100%;
    }

    .zoom-lens {
        position: absolute;
        border: 3px solid #21559b;
        /* Your theme color */
        width: 100px;
        height: 100px;
        border-radius: 50%;
        pointer-events: none;
        /* Prevents the lens from interfering with mouse interactions */
        visibility: hidden;
        background-repeat: no-repeat;
        background-color: rgba(255, 255, 255, 0.2);
        background-position: center;
        background-size: 200%;
        z-index: 100;
    }

    /* Magnific Popup Image Styling */
    /* Magnific Popup Image Styling */
    .mfp-img {
        width: 100%;
        /* Ensure the image takes up more space in the popup */
        max-height: 90%;
        /* Maintain a reasonable height */
        object-fit: contain;
        /* Maintain the aspect ratio of the image */
    }

    /* Styles for the Magnifying Glass Effect inside Magnific Popup */
    .mfp-container {
        position: relative;
    }

    .zoom-lens-popup {
        position: absolute;
        border: 3px solid #21559b;
        /* Your theme color */
        width: 200px;
        /* Larger lens size */
        height: 200px;
        /* Larger lens size */
        border-radius: 50%;
        pointer-events: none;
        visibility: hidden;
        background-repeat: no-repeat;
        background-color: rgba(255, 255, 255, 0.2);
        background-position: center;
        background-size: 500%;
        /* Larger zoom factor to show a bigger area */
        z-index: 100;
    }
</style>

<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span class=""
        style="max-width: 100%;word-break: break-all;"><?= lang('philanthropists') ?></span></div>

<div class="container pt-2">
    <section id="about-part" class="pt-40 pb-0">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <h2><b><?= lang('philanthropists') ?></b></h2>
                <div class="bar"></div>
            </div>
        </div>
    </section>


    <div class="portfolio-item row card11-grid text-center">
        <?php for ($x = 0; $x < count($add_img); $x++) { ?>
            <div class="id-<?= $add_img[$x]['id']; ?> col-lg-3 col-md-4 col-6 col-sm-6 col-12 p-2 card11">
                <a href="<?= base_url() ?>upload/<?= $add_img[$x]['photo']; ?>" class="fancylight popup-btn"
                    data-fancybox-group="light">
                    <img class="img-fluid card11__background" src="<?= base_url() ?>upload/<?= $add_img[$x]['photo']; ?>"
                        alt="img" style="width:auto; height:400px;">
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<script>

    $(document).ready(function () {
        var $popup_btn = $('.popup-btn');

        // Initialize Magnific Popup
        $popup_btn.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true // Enables gallery mode
            },
            callbacks: {
                open: function () {
                    var $mfpContent = $('.mfp-content');

                    // Append zoom lens to the popup content
                    $mfpContent.append('<div class="zoom-lens-popup"></div>');
                },
                close: function () {
                    $('.zoom-lens-popup').remove();
                }
            }
        });




        // Zoom lens logic for the image inside the popup
        $(document).on('mousemove', '.mfp-img', function (event) {
            var $img = $(this);
            var $lens = $('.zoom-lens-popup');
            var imgOffset = $img.offset();
            var lensSize = $lens.width() / 2;
            var imageWidth = $img.width();
            var imageHeight = $img.height();

            var x = event.pageX - imgOffset.left - lensSize;
            var y = event.pageY - imgOffset.top - lensSize;

            if (x < 0) x = 0;
            if (y < 0) y = 0;
            if (x + lensSize * 2 > imageWidth) x = imageWidth - lensSize * 2;
            if (y + lensSize * 2 > imageHeight) y = imageHeight - lensSize * 2;

            $lens.css({
                left: x + 'px',
                top: y + 'px',
                visibility: 'visible',
                'background-image': `url(${$img.attr('src')})`
            });

            var bgX = ((event.pageX - imgOffset.left) / imageWidth) * 100;
            var bgY = ((event.pageY - imgOffset.top) / imageHeight) * 100;

            $lens.css({
                'background-position': `${bgX}% ${bgY}%`
            });
        });

        $(document).on('mouseleave', '.mfp-img', function () {
            $('.zoom-lens-popup').css('visibility', 'hidden');
        });
    });



    $(document).ready(function () {
        const $imageContainer = $('.image-container');
        const $zoomImage = $('.zoom-image');
        const $zoomLens = $('.zoom-lens');

        $imageContainer.on('mousemove', function (event) {
            const containerOffset = $imageContainer.offset();
            const lensSize = $zoomLens.width() / 2;

            let x = event.pageX - containerOffset.left - lensSize;
            let y = event.pageY - containerOffset.top - lensSize;

            const containerWidth = $imageContainer.width();
            const containerHeight = $imageContainer.height();

            if (x < 0) x = 0;
            if (y < 0) y = 0;
            if (x + lensSize * 2 > containerWidth) x = containerWidth - lensSize * 2;
            if (y + lensSize * 2 > containerHeight) y = containerHeight - lensSize * 2;

            $zoomLens.css({
                left: x + 'px',
                top: y + 'px',
                visibility: 'visible',
                'background-image': `url(${$zoomImage.attr('src')})`,
            });

            // Set the background position inside the zoom lens
            const bgX = ((event.pageX - containerOffset.left) / containerWidth) * 100;
            const bgY = ((event.pageY - containerOffset.top) / containerHeight) * 100;

            $zoomLens.css({
                'background-position': `${bgX}% ${bgY}%`,
            });
        });

        $imageContainer.on('mouseleave', function () {
            $zoomLens.css('visibility', 'hidden');
        });
    });

</script>