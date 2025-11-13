<?php
$baseUrl = base_url('philanthropist');
$currentCategory = $selected_category ?? '';
$currentZone = $selected_zone ?? '';
$currentPage = $current_page ?? 1;
$totalPages = $total_pages ?? 1;

function q($base, $params = [])
{
    return $base . '?' . http_build_query($params);
}
?>

<style>
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

    .philanthropist-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .philanthropist-header h2 {
        font-size: 2.5rem;
        color: #333;
        font-weight: 600;
        margin-bottom: .5rem;
    }

    .philanthropist-header .bar {
        width: 80px;
        height: 4px;
        margin: 10px auto;
    }

    .philanthropist-section {
        background-color: #fff;
        /* padding: 40px 0; */
    }

    /* .design-3 .philanthropist-item {
        background-color: #fff;
        border-bottom: 2px solid #4682b4;
        padding: 10px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    } */

        .design-3 .philanthropist-item {
    background-color: #fff;
    padding: 10px;
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    position: relative; /* Needed for absolute positioning */
}

.design-3 .philanthropist-item::after {
    content: "";
    position: absolute;
    bottom: 0;
       width: 80%;
    right: 112px;
    border-bottom: 2px solid #4682b4;
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
        font-size: .95rem;
        color: #444;
        margin: 4px 0;
        line-height: 1.3;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background: linear-gradient(135deg, #ee0979 0, #ff6a00 100%);
        padding: 8px 14px;
    }

    .nav-pills .nav-link {
        color: white;
        background: linear-gradient(90deg, #0e9ea8 0, #43e794 100%);
        padding: 8px 14px;
    }

    /* ===== pagination area ===== */
    #philanthro-pagination-wrapper {
        position: sticky;
        bottom: 0;
        background: #fff;
        z-index: 40;
        padding-top: 2px;
        padding-bottom: 2px;
    }

    .philanthro-pagination-inner {
        position: relative;
    }

    .philanthro-pagination {
        margin-top: 10px;
        margin-bottom: 20px;
        gap: 1rem;
        justify-content: center !important;
    }

    .philanthro-pagination .pager-btn,
    .philanthro-pagination .page-link-custom {
        display: inline-block;
        padding: 7px 16px;
        border-radius: 999px;
        background: linear-gradient(90deg, #0e9ea8 0, #43e794 100%);
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        transition: transform .15s ease-in-out;
        border: none;
        outline: none;
        white-space: nowrap;
    }

    .philanthro-pagination .pager-btn.disabled {
        opacity: .45;
        pointer-events: none;
        cursor: default;
    }

    .philanthro-pagination .page-list {
        display: flex;
        gap: .5rem;
        align-items: center;
        flex-wrap: wrap;
        justify-content: center;
    }

    .philanthro-pagination .page-item-custom.active .page-link-custom {
        background: linear-gradient(135deg, #ee0979 0, #ff6a00 100%);
        color: #fff;
    }

    .philanthro-pagination .dots {
        padding: 0 4px;
        color: #999;
        font-weight: 600;
    }

    .philanthro-pagination a:hover {
        transform: translateY(-1px);
    }

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

        .philanthro-pagination {
            flex-direction: column;
            align-items: center !important;
        }
    }

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
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.6) 50%, rgba(255, 255, 255, 0) 100%);
        animation: shimmer 1.25s infinite;
    }

    @keyframes shimmer {
        100% {
            transform: translateX(100%);
        }
    }

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

<div class="container pt-2" style="padding-bottom: 90px">
    <div class="philanthropist-header">
        <h2><?= lang('philanthropists') ?></h2>
        <div class="bar"></div>
        <p><?= lang('philanthropist_title') ?></p>
    </div>

    <div class="design-3">
        <div class="philanthropist-section">
            <div class="container">
                <div class="row">

                    <!-- CATEGORY TABS -->
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3 gap-3 justify-content-center" id="category-tabs" role="tablist">
                            <?php foreach ($categories as $i => $cat): ?>
                                <?php
                                $isActive = ($currentCategory == $cat['id']) || (empty($currentCategory) && $i == 0);
                                $catLink = q($baseUrl, [
                                    'category' => $cat['id'],
                                    'zone' => $currentZone,
                                    'page' => 1
                                ]);
                                ?>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link category-btn <?= $isActive ? 'active' : ''; ?>"
                                        href="<?= $catLink; ?>" id="cat-<?= $cat['id']; ?>"
                                        data-category-id="<?= $cat['id']; ?>" role="tab"
                                        aria-selected="<?= $isActive ? 'true' : 'false'; ?>">
                                        <?= $cat['name']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- ZONE TABS -->
                    <div class="col-md-12 mt-2">
                        <ul class="nav nav-pills mb-3 gap-3 justify-content-center" id="zone-tabs" role="tablist">
                            <?php
                            $allZoneActive = empty($currentZone);
                            $allZoneLink = q($baseUrl, [
                                'category' => $currentCategory,
                                'zone' => '',
                                'page' => 1
                            ]);
                            ?>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link zone-btn <?= $allZoneActive ? 'active' : ''; ?>"
                                    href="<?= $allZoneLink; ?>" id="zone-all" data-zone-id="" role="tab"
                                    aria-selected="<?= $allZoneActive ? 'true' : 'false'; ?>">
                                    All Zones
                                </a>
                            </li>
                            <?php foreach ($zones as $zone): ?>
                                <?php
                                $zActive = ($currentZone == $zone['id']);
                                $zoneLink = q($baseUrl, [
                                    'category' => $currentCategory,
                                    'zone' => $zone['id'],
                                    'page' => 1
                                ]);
                                ?>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link zone-btn <?= $zActive ? 'active' : ''; ?>" href="<?= $zoneLink; ?>"
                                        id="zone-<?= $zone['id']; ?>" data-zone-id="<?= $zone['id']; ?>" role="tab"
                                        aria-selected="<?= $zActive ? 'true' : 'false'; ?>">
                                        <?= $zone['short_name']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>

                <!-- LIST -->
                <section id="philanthropists-3">
                    <div id="philanthropist-list-wrapper">
                        <?= $list_html ?>
                    </div>
                </section>

                <!-- PAGINATION (sticky) -->
                <div id="philanthro-pagination-wrapper">
                    <?= $pagination_html ?>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    (function ($) {

        const BASE_URL = "<?= $baseUrl ?>";

        function buildUrl(categoryId, zoneId, page = 1) {
            const params = new URLSearchParams();
            params.set('category', categoryId);
            if (zoneId !== '') {
                params.set('zone', zoneId);
            } else {
                params.set('zone', '');
            }
            params.set('page', page);
            return BASE_URL + '?' + params.toString();
        }

        function syncFilterLinks(currentCategory, currentZone) {
            $('.category-btn').each(function () {
                const catId = $(this).data('category-id');
                const href = buildUrl(catId, currentZone, 1);
                $(this).attr('href', href);
            });

            $('.zone-btn').each(function () {
                const zoneId = $(this).data('zone-id');
                const href = buildUrl(currentCategory, zoneId, 1);
                $(this).attr('href', href);
            });
        }

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
            if (reset) $row.html("");
            let html = "";
            for (let i = 0; i < count; i++) html += createSkeletonItem();
            $row.append($(html).hide().fadeIn(300));
        }

        function hideSkeleton() {
            $("#philanthropists-3 .row .skeleton-wrapper").remove();
        }

        const delay = function (ms) {
            return new Promise((resolve) => {
                setTimeout(resolve, ms);
            });
        };

        async function loadPhilanthropists(href) {

            $(".category-btn, .zone-btn").attr('disabled', true);
            const ajaxUrl = href.indexOf('?') === -1 ? href + '?ajax=1' : href + '&ajax=1';

            showSkeleton($(".philanthropist-item").length || 6, true);
            await delay(500);

            return $.get(ajaxUrl, function (res) {
                hideSkeleton();

                if (res.list_html !== undefined) {
                    $('#philanthropist-list-wrapper').html(res.list_html);
                }
                if (res.pagination_html !== undefined) {
                    $('#philanthro-pagination-wrapper').html(res.pagination_html);
                    if (parseInt(res.total_pages, 10) <= 1) {
                        $('#philanthro-pagination-wrapper').hide();
                    } else {
                        $('#philanthro-pagination-wrapper').show();
                    }
                }

                if (res.selected_category) {
                    $('.category-btn').removeClass('active');
                    $('#cat-' + res.selected_category).addClass('active');
                }

                $('.zone-btn').removeClass('active');
                if (res.selected_zone === '' || res.selected_zone === null) {
                    $('#zone-all').addClass('active');
                } else {
                    $('#zone-' + res.selected_zone).addClass('active');
                }

                syncFilterLinks(res.selected_category, res.selected_zone);

                window.history.pushState(null, '', href);

            }, 'json').always(function () {
                $(".category-btn, .zone-btn").attr('disabled', false);
            });
        }

        $(document).on('click', '.category-btn, .zone-btn, .philanthro-pagination a', function (e) {
            const href = $(this).attr('href');
            if (!href || href === '#') {
                return;
            }
            e.preventDefault();
            loadPhilanthropists(href);
        });

        syncFilterLinks("<?= $currentCategory ?>", "<?= $currentZone ?>");

    })(jQuery);
</script>