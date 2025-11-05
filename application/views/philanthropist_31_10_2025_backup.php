<style>
    /* Inner page section (shared) */
    .inner-page {
        background-color: #f5f5f5;
        color: #333;
        font-weight: 600;
        font-size: 2rem;
        padding: 2rem;
        text-align: center;
        border-bottom: 3px solid #4682b4;
    }

    .inner-page .contents {
        display: contents !important;
    }

    /* Header styling (shared) */
    .philanthropist-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .philanthropist-header h2 {
        font-size: 2.5rem;
        color: #333;
        font-weight: 600;
        /* text-transform: uppercase; */
        margin-bottom: 0.5rem;
    }

    .philanthropist-header .bar {
        width: 80px;
        height: 4px;
        margin: 10px auto;
    }

    /* Philanthropist section (shared) */
    .philanthropist-section {
        background-color: #fff;
        padding: 40px 0;
    }



    /* Design 3: Card with Compact Layout and Underlined Name */
    .design-3 .philanthropist-item {
        background-color: #fff;
        border-bottom: 2px solid #4682b4;
        padding: 10px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .design-3 .philanthropist-item img {
        width: 140px;
        height: 120px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 15px;
    }

    .design-3 .philanthropist-item .content {
        flex: 1;
        text-align: left;
    }

    .design-3 .philanthropist-item h5 {
        display: inline-block; 
        font-size: 1.4rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        border-bottom: 1px solid #4682b4;
        padding-bottom: 5px;
    }

    .design-3 .philanthropist-item p {
        font-size: 0.95rem;
        color: #444;
        margin: 4px 0;
        line-height: 1.3;
    }

    .design-3 .philanthropist-item p strong {
        color: #333;
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
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 12px;
        }

        .philanthropist-item img {
            width: 100%;
            height: 140px;
            margin-right: 0;
            margin-bottom: 12px;
        }

        .philanthropist-item .content {
            text-align: center;
        }

        .philanthropist-item h5 {
            font-size: 1.5rem;
        }

        .philanthropist-item p {
            font-size: 0.95rem;
        }

        .design-2 .philanthropist-item img {
            width: 120px;
            height: 120px;
        }

        .design-4 .philanthropist-item img {
            height: 160px;
        }
    }

    /* Separator for designs */
    .design-separator {
        margin: 40px 0;
        text-align: center;
        font-size: 1.5rem;
        color: #333;
        font-weight: 600;
        border-top: 2px solid #e5e5e5;
        padding-top: 20px;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background: linear-gradient(135deg, #ee0979 0, #ff6a00 100%);

        padding: 8px 14px;
    }

    .nav-pills .nav-link {
        color: white;
        background: -webkit-gradient(linear, left top, right top, from(#0e9ea8), to(#43e794));
        background: linear-gradient(90deg, #0e9ea8 0, #43e794 100%);
        padding: 8px 14px;
    }

    /* .main-zone-div span {
        display: block;

    } */

    /* Skeleton shimmer */
    .skeleton {
        position: relative;
        overflow: hidden;
        background: #ececec;
        border-radius: 6px;
    }

    .skeleton::after {
        content: "";
        position: absolute;
        inset: 0;
        transform: translateX(-100%);
        background: linear-gradient(90deg,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.6) 50%,
                rgba(255, 255, 255, 0) 100%);
        animation: shimmer 1.25s infinite;
    }

    @keyframes shimmer {
        100% {
            transform: translateX(100%);
        }
    }

    /* Skeleton card layout (mirrors your .philanthropist-item) */
    .skeleton-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 10px;
        border-bottom: 2px solid #4682b4;
        background: #fff;
        border-radius: 4px;
    }

    .skel-img {
        width: 140px;
        height: 120px;
        border-radius: 4px;
    }

    .skel-lines {
        flex: 1;
    }

    .skel-line {
        height: 14px;
        margin-bottom: 10px;
        border-radius: 4px;
    }

    .skel-line.lg {
        height: 24px;
        margin-bottom: 12px;
    }

    .skel-line.w-90 {
        width: 90%;
    }

    .skel-line.w-70 {
        width: 70%;
    }

    .skel-line.w-50 {
        width: 50%;
    }

    /* Mobile match your card layout */
    @media only screen and (max-width: 600px) {
        .skeleton-card {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .skel-img {
            width: 100%;
            height: 140px;
        }

        .skel-lines {
            width: 100%;
        }
    }
</style>

<div class="inner-page">
    <span class="contents"><?= lang('philanthropists') ?></span>
</div>

<div class="container pt-5">

    <div class="philanthropist-header">
        <h2><?= lang('philanthropists') ?></h2>

        <div class="bar"></div>
        <p><?= lang('philanthropist_title') ?></p>
    </div>

    <? $dummyImage = base_url() . 'upload/men-image.jpg'; ?>


    <div class="design-3">
        <div class="philanthropist-section">
            <div class="container ">
                <div class="row">

                    <div class="col-md-12">
                        <!-- Category Tabs -->
                        <ul class="nav nav-pills mb-3 gap-3 justify-content-center" id="category-tabs" role="tablist">

                            <?php foreach ($categories as $i => $cat): ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link category-btn <?= $i == 0 ? 'active' : ''; ?>"
                                        data-category="<?= $cat['id']; ?>"
                                        id="cat-<?= $cat['id']; ?>"
                                        data-bs-toggle="pill"
                                        type="button"
                                        role="tab"
                                        aria-selected="false"><?= $cat['name']; ?></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>

                    <div class="col-md-12 mt-2">
                        <ul class="nav nav-pills mb-3 gap-3 justify-content-center" id="zone-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link zone-btn active"
                                    data-zone=""
                                    id="zone-all"
                                    type="button"
                                    role="tab"
                                    aria-selected="true">All Zones
                                </button>
                            </li>
                            <?php foreach ($zones as $zone): ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link zone-btn"
                                        data-zone="<?= $zone['id']; ?>"
                                        id="zone-<?= $zone['id']; ?>"
                                        type="button"
                                        role="tab"
                                        aria-selected="false"><?= $zone['short_name']; ?></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- <div class="col-md-4 main-zone-div offset-md-4">
                        <label for="zoneFilter"><strong>Zone:</strong></label>
                        <select id="zoneFilter" class="form-control">
                            <option value="">All Zones</option>
                            <?php foreach ($zones as $zone): ?>
                                <option value="<?= $zone['id']; ?>"><?= $zone['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                </div>
                <section id="philanthropists-3">

                    <div class="row">
                        <?php foreach ($philanthropists ?? [] as $philanthropist): ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                                <div class="philanthropist-item">
                                    <a href="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" class="fancylight popup-btn">
                                        <img src="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" alt="<?= $philanthropist['name']; ?>"
                                            onerror="this.src = '<?= $dummyImage ?>'">
                                    </a>
                                    <div class="content">
                                        <h5><?= $philanthropist['name']; ?></h5>
                                        <p><?= $philanthropist['company']; ?></p>
                                        <p><?= $philanthropist['city']; ?></p>
                                        <p><?= $philanthropist['category']; ?></p>
                                        <p><?= $philanthropist['zone']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <div class="text-center mt-4 mb-5">
                    <button id="load-more" class="btn btn-primary">Load More</button>
                    <div id="loading" style="display:none; margin-top:10px;">Loading...</div>
                </div>

            </div>
        </div>
    </div>

</div>


<script>
    $(document).ready(function() {
        let offset = 0;
        const limit = 50;


        function createSkeletonItem() {
            return `
                <div class="col-lg-6 col-md-6 col-sm-12 p-2 skeleton-wrapper">
                    <div class="skeleton-card">
                        <div class="skeleton skel-img"></div>
                        <div class="skel-lines">
                            <div class="skeleton skel-line lg w-90"></div>
                            <div class="skeleton skel-line w-70"></div>
                            <div class="skeleton skel-line w-50"></div>
                            <div class="skeleton skel-line w-70"></div>
                            <div class="skeleton skel-line w-50"></div>
                        </div>
                    </div>
                </div>`;
        }

        function showSkeleton(count = 6, reset = false) {
            const $row = $("#philanthropists-3 .row");
            if (reset) $row.html(""); // clear before showing skeletons for fresh loads
            let html = "";
            for (let i = 0; i < count; i++) html += createSkeletonItem();
            $row.append($(html).hide().fadeIn(300));

        }

        function hideSkeleton() {
            $("#philanthropists-3 .row .skeleton-wrapper").remove();
        }

        const delay = function(ms) {
            return new Promise((resolve) => {
                setTimeout(resolve, ms);
            });
        };


        async function loadPhilanthropists(reset = false) {
            const category_id = $("#category-tabs .category-btn.active").data("category");
            // const zone_id = $("#zoneFilter").val();
            const zone_id = $("#zone-tabs .zone-btn.active").data("zone") || "";

            showSkeleton(6, reset);
            if (reset)  offset = 0;       

            $("#loading").show();
            $("#load-more").prop("disabled", true).text("Loading...");

            await delay(500);


            $.ajax({
                url: "<?= base_url('philanthropist/load_more') ?>",
                type: "POST",
                data: {
                    offset: offset,
                    category: category_id,
                    zone: zone_id
                },
                dataType: "json",
                success: function(data) {
                    hideSkeleton();
                    $("#loading").hide();
                    $("#load-more").prop("disabled", false).text("Load More");

                    if (data.length > 0) {
                        $.each(data, function(index, philanthropist) {
                            const dummyImage = "<?= base_url('upload/men-image.jpg') ?>";
                            const html = `
                            <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                                <div class="philanthropist-item">
                                    <a href="<?= base_url() ?>upload/${philanthropist.photo}" class="fancylight popup-btn">
                                        <img src="<?= base_url() ?>upload/${philanthropist.photo}"
                                             alt="${philanthropist.name}"
                                             onerror="this.src='${dummyImage}'">
                                    </a>
                                    <div class="content">
                                        <h5>${philanthropist.name}</h5>
                                        <p>${philanthropist.company ?? ''}</p>
                                        <p>${philanthropist.city ?? ''}</p>
                                        <p>${philanthropist.zone ?? ''}</p>
                                    </div>
                                </div>
                            </div>`;
                            $("#philanthropists-3 .row").append($(html).hide().fadeIn(500));

                        });

                        offset += limit;
                    } else {
                        if (offset === 0) {
                            $("#philanthropists-3 .row").html("<p class='text-center'>No philanthropists found.</p>");
                        }
                        $("#load-more").hide();
                    }
                },
                error: function() {
                    hideSkeleton();
                    $("#loading").hide();
                    $("#load-more").prop("disabled", false).text("Load More");
                    alert("Error loading more philanthropists.");
                }
            });
        }

        $("#load-more").on("click", function() {
            loadPhilanthropists(false);
        });

        loadPhilanthropists(false);

        $(document).on("click", ".category-btn", function() {
            $("#load-more").show();
            loadPhilanthropists(true);
        });

         $(document).on("click", ".zone-btn", function() {
            $(".zone-btn").removeClass("active");
            $(this).addClass("active");
            $("#load-more").show();
            loadPhilanthropists(true);
        });

       // $("#zoneFilter").select2();
        // Filter change
      //  $("#zoneFilter").on("change", function() {
        //    $("#load-more").show();
      //      loadPhilanthropists(true);
       // });
    });
</script>