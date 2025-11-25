<?php
$language = $this->session->userdata('site_language');
if (empty($language)) {
    $language = "english";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title><?= $page_title; ?> | <?= lang('sardardham') ?></title>

    <!--css-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css" media>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet" as="font">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" media>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css" media>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>upload/sardardham-logo-removebg-preview-min.png"
        type="image/png">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" media rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.css" media>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css?v=2" media>

    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css" media>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">



    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>plugins/summernote/summernote-bs4.min.css">



    <script>
        ! function (e) {
            "undefined" == typeof module ? this.charming = e : module.exports = e
        }(function (e, n) {
            "use strict";
            n = n || {};
            var t = n.tagName || "span",
                o = null != n.classPrefix ? n.classPrefix : "char",
                r = 1,
                a = function (e) {
                    for (var n = e.parentNode, a = e.nodeValue, c = a.length, l = -1; ++l < c;) {
                        var d = document.createElement(t);
                        o && (d.className = o + r, r++), d.appendChild(document.createTextNode(a[l])), n.insertBefore(d, e)
                    }
                    n.removeChild(e)
                };
            return function c(e) {
                for (var n = [].slice.call(e.childNodes), t = n.length, o = -1; ++o < t;) c(n[o]);
                e.nodeType === Node.TEXT_NODE && a(e)
            }(e), e
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"
        integrity="sha512-VEBjfxWUOyzl0bAwh4gdLEaQyDYPvLrZql3pw1ifgb6fhEvZl9iDDehwHZ+dsMzA0Jfww8Xt7COSZuJ/slxc4Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--====== jquery js ======-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link async as="font" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        media>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"
        integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css" media>

    <!--====== Style css ======-->
    <link async rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css" media>
    <link async rel="stylesheet" href="<?php echo base_url(); ?>assets/css/hover-min.css" media>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/style-1.css" media>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <!--====== PRELOADER PART START ======-->
    <div class="preloader text-center">
        <div class="loader rubix-cube">
            <img loading="lazy" src="<?= base_url('upload/logo-round.webp'); ?>" class="rotate">
        </div>
    </div>
    <!--====== PRELOADER PART START ======-->
    <!--====== HEADER PART START ======-->

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="<?php echo base_url(); ?>assets/images/SDTheme.png" class="img-fluid" alt="Sardar dham"
                    title="sardar dham">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a class="navbar-brand" href="/">
                            <img src="<?php echo base_url(); ?>assets/images/SDTheme.png" class="img-fluid"
                                alt="Sardar dham" title="sardar dham">
                        </a></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-column">
                    <ul class="navbar-nav justify-content-end flex-grow-1 top-navbar">
                        <li class="nav-item">
                            <p>ISO 9001:2015 Certification No : 3FC03F0E</p>
                        </li>
                        <li class="nav-item social-icon">
                            <a class="nav-link bg-facebook" href="https://www.facebook.com/SardardhamOfficial/"
                                target="_blank" title="Like us on Facebook"><i class="fa-brands fa-facebook-f"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item social-icon">
                            <a class="nav-link bg-instagram" href="https://www.instagram.com/sardardham_official/"
                                target="_blank" title="Follow us on Instagram"><i class="fa-brands fa-instagram"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item social-icon">
                            <a class="nav-link bg-twitter" href="https://x.com/sardardham_" target="_blank"
                                title="Follow us on Twitter"><i class="fa-brands fa-x-twitter"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item social-icon">
                            <a class="nav-link bg-youtube" href="https://www.youtube.com/c/SardardhamOfficial"
                                target="_blank" title="Subscribe us on YouTube"><i class="fa-brands fa-youtube"
                                    aria-hidden="true"></i></a>
                        </li>

                        <!-- <li class="nav-item lang-icon">
                            <select class="form-select language_selector select2"
                                data-minimum-results-for-search="Infinity" id="website_language"
                                name="website_language">
                                <!-- <option selected disabled>Language</option> -->
                        <!-- <option value="english" < ($language == 'english') {
                                    echo "selected";
                                }
                                ; ?>>
                                    English</option>
                                <option value="gujarati" < ($language == 'gujarati') {
                                    echo "selected";
                                }
                                ?>>
                                    Gujarati
                                </option>
                            </select> -->
                        <!-- </li> -->

                        <li class="nav-item lang-icon d-flex align-items-center">
                            <div class="lang-switch">
                                <button type="button" class="lang-btn <?= ($language == 'english') ? 'active' : '' ?>"
                                    data-lang="english" aria-label="Switch to English">
                                    <span class="flag">Eng</span>
                                </button>
                                <button type="button" class="lang-btn <?= ($language == 'gujarati') ? 'active' : '' ?>"
                                    data-lang="gujarati" aria-label="Switch to Gujarati">
                                    <span class="flag">Guj</span>
                                </button>
                            </div>
                        </li>


                    </ul>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 bottom-navbar">
                        <!-- <li class="nav-item"><a class="nav-link active" href="">Home</a></li> -->
                        <li class="nav-item dropdown">
                             <?php
                            $isActive = (strpos($this->uri->uri_string(), "about-us") === 0) ? 'active' : '';
                            ?>
                            <a class="nav-link dropdown-toggle <?=  $isActive?>"
                                href="#" id="aboutUsDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="outside">
                                <?php echo lang('about_us'); ?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="aboutUsDropdown">
                                <?php
                                $aboutUs = [
                                    'sardardham-a-thought' => "thought",
                                    'mission-vision-goal'  => 'mission_vision_goal',
                                    'philanthropist'       => 'philanthropist',
                                    'team-sardardham'      => 'team'
                                ];
                                foreach ( $aboutUs as $url => $name ) {
                                    ?>
                                    <li class="<?= is_active("about-us/{$url}") ?>">
                                        <a class="dropdown-item "
                                            href="<?= base_url("about-us/{$url}"); ?>"><?= lang($name) ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <?php
                            $isActive = (strpos($this->uri->uri_string(), "our-goals") === 0) ? 'active' : '';
                            ?>
                            <a class="nav-link dropdown-toggle <?= $isActive ?> " href="#" id="ourTeamDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-auto-close="outside"><?= lang('five_goals') ?></a>
                            <ul class="dropdown-menu" aria-labelledby="ourTeamDropdown">
                                <?php
                                global $goals;
                                $goals = queryLang()->order_by("sequence", "ASC")->get("goals")->result();
                                foreach ( $goals as $goal ) {
                                    $preFix = $goal->active == 0 ? "our-goals/" : "home/goals/";
                                    ?>
                                    <li
                                        class="<?= $this->uri->uri_string() == ($goalUrl = $preFix . urlencode($goal->slug)) ? 'active' : '' ?>">
                                        <a href="<?= base_url($goalUrl) ?>" class="dropdown-item"><?= $goal->title ?>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>

                        <li class=" nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= is_active([
                                'activities/students-adoption-scheme',
                                'activities/scholarship-scheme',
                                'activities/update',
                                'activities/revenue-guidance-centre',
                                'activities/medical-centre',
                                'activities/business-development-center',
                                'activities/trustee-guest-house'
                            ]) ?>" href="#" id="activityDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="outside">
                                <?php echo lang('activity'); ?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="activityDropdown">
                                <li class="<?= is_active('activities/students-adoption-scheme') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('activities/students-adoption-scheme'); ?>"><?= lang('dikri_datak_yojna_sardardham') ?></a>
                                </li>
                                <li class="<?= is_active('activities/scholarship-scheme') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('activities/scholarship-scheme'); ?>"><?= lang('dr_chittaranjanbhai'); ?></a>
                                </li>
                                <li class="<?= is_active('activities/update') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('activities/update'); ?>"><?= lang('ek_vichar_magazine'); ?></a>
                                </li>
                                <li class="<?= is_active('activities/revenue-guidance-centre') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('activities/revenue-guidance-centre'); ?>"><?= lang('revenue_guidance_centre'); ?></a>
                                </li>
                                <li class="<?= is_active('activities/medical-centre') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('activities/medical-centre'); ?>"><?= lang('medical_centre'); ?></a>
                                </li>
                                <li class="<?= is_active('activities/business-development-center') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('activities/business-development-center'); ?>"><?= lang('business_development_center'); ?></a>
                                </li>
                                <li class="<?= is_active('activities/trustee-guest-house') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('activities/trustee-guest-house'); ?>"><?= lang('trustee_guest_house'); ?></a>
                                </li>
                            </ul>
                        </li>

                        <li class=" nav-item">
                            <a class="nav-link <?= is_active('spibo') ?>"
                                href="<?= base_url('spibo') ?>"><?= lang('lng_spibo'); ?></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= is_active([ 'admission/ahmedabad', 'admission/bhuj_kutch', 'admission/hostel_facilities' ]) ?>"
                                href="#" id="admissionDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="outside">
                                <?= lang('admission') ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="admissionDropdown">
                                <li class="<?= is_active('admission/hostel_facilities') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('admission/hostel_facilities'); ?>"><?= lang('hostel_facilities') ?></a>
                                </li>
                                <li class="<?= is_active('admission/ahmedabad') ?>">
                                    <a class="dropdown-item "
                                        href="https://csc.sardardham.org/?utm_source=sardardham.org"><?= lang('ahmedabad'); ?></a>
                                </li>
                                <li class="<?= is_active('admission/bhuj_kutch') ?>">
                                    <a class="dropdown-item "
                                        href="https://bhuj.sardardham.org/?utm_source=sardardham.org"><?= lang('bhuj_kutch'); ?></a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= is_active([ 'media/news', 'media/event', 'media/video-gallery', 'media/gallery' ]) ?>"
                                href="#" id="mediaDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="outside">
                                <?= lang('gallery') ?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="admissionDropdown">
                                <li class="<?= is_active('media/news') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('media/news'); ?>"><?= lang('news_media') ?></a>
                                </li>
                                <li class="<?= is_active('media/event') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('media/event') ?>"><?= lang('event'); ?></a>
                                </li>
                                <li class="<?= is_active('media/video-gallery') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('media/video-gallery'); ?>"><?= lang('video_gallery'); ?></a>
                                </li>
                                <li class="<?= is_active('media/gallery') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('media/gallery'); ?>"><?= lang('image_gallery'); ?></a>
                                </li>
                            </ul>
                        </li>


                        <li class=" nav-item">
                            <a class="nav-link <?= is_active([ 'donation', 'donation_details' ]) ?>"
                                href="<?= base_url('donation') ?>"><?= lang('donation'); ?></a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="http://job.sardardham.org/"
                                target="_blank"><?= lang('job_portal'); ?></a>
                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= is_active([ 'update/download', 'update/documentary' ]) ?>"
                                href="#" id="updateDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="outside">
                                <?= lang('update') ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="updateDropdown">
                                <li class="<?= is_active('update/download') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('update/download'); ?>"><?= lang('downloads') ?></a>
                                </li>
                                <li class="<?= is_active('admission/ahmedabad') ?>">
                                    <a class="dropdown-item "
                                        href="https://csc.sardardham.org/home/requirements"><?= lang('requirements'); ?></a>
                                </li>
                                <li class="<?= is_active('update/documentary') ?>">
                                    <a class="dropdown-item "
                                        href="<?= base_url('update/documentary'); ?>"><?= lang('documentary'); ?></a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= is_active('contact-us') ?>"
                                href="<?= base_url('contact-us'); ?>"><?= lang('contact-us') ?>&nbsp;</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <!--====== HEADER PART ENDS ======-->
    <!--====== SEARCH BOX PART START ======-->
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <!--====== SEARCH BOX PART ENDS ======-->

    <div class="main-page-area">
        <?php $this->load->view($page_name . ".php"); ?>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="footer-about">
                    <div class="single-features-box row m-0 col-lg-12 col-md-12 col-sm-12  justify-content-center py-2">
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook">
                            <i>
                                <a target="_blank" href="https://www.facebook.com/SardardhamOfficial/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                        </path>
                                    </svg>
                                </a>
                            </i>
                        </div>&nbsp;&nbsp;
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Youtube">
                            <i>
                                <a target="_blank" href="https://www.youtube.com/c/SardardhamOfficial">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-youtube" viewBox="0 0 16 16">
                                        <path
                                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z">
                                        </path>
                                    </svg>
                                </a>
                            </i>
                        </div>&nbsp;&nbsp;
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram">
                            <i>
                                <a target="_blank" href="https://www.instagram.com/sardardham_official/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-instagram" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                        </path>
                                    </svg>
                                </a>
                            </i>
                        </div>
                        &nbsp; &nbsp;
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Gmail">
                            <i>
                                <a target="_blank" href="mailto:inquiry.sardardham@gmail.com">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z">
                                        </path>
                                    </svg>
                                </a>
                            </i>
                        </div>
                        &nbsp; &nbsp;
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Whatsapp">
                            <i>
                                <a target="_blank" href="http://api.whatsapp.com/send?phone=917575001428">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                                        </path>
                                    </svg>
                                </a>
                            </i>
                        </div>
                        &nbsp; &nbsp;
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter">
                            <i>
                                <a target="_blank" href="https://x.com/sardardham_">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-twitter"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1"
                                        width="24px" height="24px" viewBox="0 0 24 24"
                                        style="enable-background:new 0 0 24 24;" xml:space="preserve">
                                        <path
                                            d="M14.095479,10.316482L22.286354,1h-1.940718l-7.115352,8.087682L7.551414,1H1l8.589488,12.231093L1,23h1.940717  l7.509372-8.542861L16.448587,23H23L14.095479,10.316482z M11.436522,13.338465l-0.871624-1.218704l-6.924311-9.68815h2.981339  l5.58978,7.82155l0.867949,1.218704l7.26506,10.166271h-2.981339L11.436522,13.338465z" />
                                    </svg>
                                </a>
                            </i>
                        </div>
                        &nbsp; &nbsp;
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Telegram Chanel">
                            <i>
                                <a target="_blank" href="https://t.me/Sardardham_Info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-telegram" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z">
                                        </path>
                                    </svg>
                                </a>
                            </i>
                        </div>
                        &nbsp; &nbsp;
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Telegram Group">
                            <i>
                                <a target="_blank" href="https://t.me/SardardhamOfficialGroup">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-telegram" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z">
                                        </path>
                                    </svg>
                                </a>
                            </i>
                        </div>
                        &nbsp; &nbsp;
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Mobile No">
                            <i>
                                <a target="_blank" href="tel:7575001596">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                        </path>
                                    </svg>
                                </a>
                            </i>
                        </div>
                        &nbsp; &nbsp;
                        <div class="icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Location">
                            <i>
                                <a target="_blank" href="https://sardardham.org/upload/Locate us.pdf">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z">
                                        </path>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                        </path>
                                    </svg>
                                </a>
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $locations = queryLang()->order_by("sequence", "ASC")->get("location")->result(); ?>
    <div class="container-fluid pt-40 pb-40 location-section">
        <div class="row g-4">
            <?php foreach ( $locations as $l ) { ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex align-items-stretch">
                    <div class="card location-card shadow-lg w-100">

                        <!-- Header -->
                        <div class="card-header location-header text-center">
                            <a target="_blank" href="<?= $l->link ?>" class="location-title"><?= $l->title ?></a>
                        </div>

                        <!-- Body -->
                        <div class="card-body location-body">
                            <p class="location-address mb-0"><?= $l->address ?></p>
                        </div>

                        <!-- Footer -->
                        <!-- <?php if (!empty($l->footer_info)) { ?>
                            <div class="card-footer location-footer text-center mt-auto">
                                <span class="location-footer-info"><b><?= $l->footer_info ?></b></span>
                            </div>
                        <?php } ?> -->
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <?php $this->load->view("components/footer"); ?>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <!--<h4 class="modal-title">Requirements</h4>-->
                </div>
                <div class="modal-body">
                    <img loading="lazy" src="<?= base_url('/upload/') ?>Job Placement add insta.png" />
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('/upload/') ?>Recruitment-July-22-Web Post.pdf" target="_blank"><button
                            type="button" class="btn btn-success" data-dismiss="modal">View Details</button></a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--====== FOOTER PART ENDS ======-->

    <!-- Language Modal -->
    <div class="modal fade" id="languageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="languageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 10px; box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);">
                <div class="modal-header"
                    style="background-color: #05C0C0; color: white !important; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h5 class="modal-title" id="languageModalLabel" style="color: white !important">Select Your Language
                    </h5>
                </div>
                <div class="modal-body" style="padding: 30px;">
                    <form id="languageForm" method="POST">
                        <div class="mb-4">
                            <label for="languageSelect" class="form-label" style="font-weight: 600;">Choose
                                Language</label>
                            <select class="form-select w-100 m-0" id="languageSelect" name="language"
                                style="padding: 15px; border-radius: 8px; font-size: 1.1rem;  border: 1px solid #ddd;">
                                <option value="english" <?php if ($language == 'english') {
                                    echo "selected";
                                }
                                ; ?>>
                                    English</option>
                                <option value="gujarati" <?php if ($language == 'gujarati') {
                                    echo "selected";
                                }
                                ; ?>>
                                    Gujarati</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-primary submitButton">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!--====== BACK TO TP PART START ======-->
    <a href="#" class="back-to-top" style="background-color:#21559b;"><i class="fa fa-angle-up"></i></a>
    <!--====== BACK TO TP PART ENDS ======-->


    <!--====== Bootstrap js ======-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


    <!--====== AOS js ======-->
    <script src="<?php echo base_url(); ?>assets/js/aos.js"></script>

    <!--====== Slick js ======-->
    <script src="<?php echo base_url(); ?>assets/js/slick.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"
        integrity="sha512-fHXRw0CXruAoINU11+hgqYvY/PcsOWzmj0QmcSOtjlJcqITbPyypc8cYpidjPurWpCnlB8VKfRwx6PIpASCUkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>

    <!--====== Nice Select js ======-->
    <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.nice-select.min.js"></script> -->

    <!--====== Nice Number js ======-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.nice-number.min.js"></script>

    <!--====== Count Down js ======-->
    <script async src="<?php echo base_url(); ?>assets/js/jquery.countdown.min.js"></script>

    <!--====== Validator js ======-->
    <script async src="<?php echo base_url(); ?>assets/js/validator.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script async src="<?php echo base_url(); ?>assets/js/ajax-contact.js"></script>

    <!--====== Main js ======-->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <!--====== Map js ======-->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="<?php echo base_url(); ?>assets/js/map-script.js"></script>

    <!-- Summernote -->
    <script src="<?= base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script>


    <style>



    </style>

    <script>
        const offcanvas = document.getElementById('offcanvasNavbar');
        const wrapper = document.querySelector('.main-page-area');

        offcanvas.addEventListener('show.bs.offcanvas', () => {
            wrapper.classList.add('door-open');
            wrapper.classList.remove('door-close');
        });

        offcanvas.addEventListener('hide.bs.offcanvas', () => {
            wrapper.classList.remove('door-open');
            wrapper.classList.add('door-close');
        });

    </script>


    <script>
        AOS.init();
    </script>

    <script>

        window.onload = function () {
            $(".preloader").fadeOut();
        }

        // $("#website_language").select2();
        $.fn.jQuerySimpleCounter = function (options) {
            var settings = $.extend({
                start: 0,
                end: 100,
                easing: 'swing',
                duration: 400,
                complete: ''
            }, options);

            var thisElement = $(this);

            $({ count: settings.start }).animate({ count: settings.end }, {
                duration: settings.duration,
                easing: settings.easing,
                step: function () {
                    var mathCount = Math.ceil(this.count);
                    thisElement.text(mathCount);
                },
                complete: () => {
                    thisElement.text(settings.end);
                }
            });
        };

        $(document).ready(function () {
            let visitorCount = <?= (int) get_setting('VISITOR_COUNT'); ?>;
            $('#visitorCounter').jQuerySimpleCounter({ end: visitorCount, duration: 1000 });
        });
    </script>

    <script defer type='text/javascript'>
        $(document).ready(function () {
            // $("#myModal").modal('show');
            $('#show-password').click(function () {
                $(this).is(':checked') ? $('#show-password-field').attr('type', 'text') : $('#show-password-field').attr('type', 'password');
            });


            $(window).scroll(function () {
                var scroll = $(window).scrollTop();

                if (scroll >= 100) {
                    $("body").addClass("scrolled");
                    $(".back-top").addClass("back-top-show");
                }
                else {
                    $("body").removeClass("scrolled");
                    $(".back-top").removeClass("back-top-show");
                }
            });
        });

        if (".slide-image") {
            $('.lazyload').lazyload({
                'onLoad': function (e, LLobj) {
                    var $img = LLobj.$element;
                    var src = $img.attr('data-src');
                    $img.css('background-image', 'url("' + src + '")');
                }
            });
        }
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.defer = true;
            s1.src = 'https://embed.tawk.to/62d133987b967b117999a96d/1g80j33ll';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->



    <script>
        var baseUrl = "<?php echo base_url(); ?>";
        // function changeLanguage() {
        //     var selectedLanguage = document.getElementsByClassName('language_selector').value;
        //     window.location.href = baseUrl+'/home/switch_language/' + selectedLanguage;
        // }

        // $("#website_language").select2();



        // $(".language_selector").change(function (e) {
        //     e.preventDefault();
        //     var selectedLanguage = $(this).val();
        //     console.log(selectedLanguage);
        //     window.location.href = baseUrl + '/home/switch_language/' + selectedLanguage;
        // });

        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.lang-btn');
            if (!btn) return; // click wasn't on a lang button

            const lang = btn.getAttribute('data-lang');
            // build a clean URL whether baseUrl ends with / or not
            const target = baseUrl.replace(/\/+$/, '') + '/home/switch_language/' + lang;
            window.location.href = target;
        });

        // $(document).on("click",".submitButton",function(e){
        //     var language = $('#languageSelect').find(":selected").val();
        //     alert(language);
        // });
        // <?php if (empty($this->session->userdata('site_language'))) { ?>
            //       var modal = new bootstrap.Modal(document.getElementById('languageModal'));
            //         modal.show();
            // <?php } ?>
    </script>
</body>

</html>