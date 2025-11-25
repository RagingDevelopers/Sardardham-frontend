<style>
    footer .footer-links .col {
        position: relative;
    }

    footer .footer-links .col:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        border-right: 1px dashed #0b3d91;
    }

    /* ======= Sardardham Footer (Blue Theme) ======= */
    footer#footer-part {
        background-color: #eaf2fb;
        /* Light blue background */
        border-top: 2px dotted #0b3d91;
        padding: 50px 0 0 0;
        font-family: 'Segoe UI', sans-serif;
    }

    footer .footer-links h4 {
        font-family: HelveticaNeue-Bold;
        font-size: 18px;
        color: #0b3d91;
        margin-bottom: 15px;
    }


    #footer-part ul li {
        margin-bottom: 8px;
    }

    #footer-part ul li a {
        text-decoration: none;
        color: #1a1a1a;
        transition: 0.3s;
    }

    #footer-part ul li a:hover {
        color: #0b3d91;
    }

    .footer-contact i {
        color: #0b3d91;
        margin-right: 10px;
    }

    .footer-logo img {
        max-width: 160px;
        margin-bottom: 10px;
    }

    footer .footer-links .footer-contact-sec .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    footer .footer-links .footer-contact-sec .contact-item h5,
    footer .footer-links .footer-contact-sec .contact-item a {
        font-family: HelveticaNeue-Medium;
        font-size: 16px;
        color: #080808;
        margin-bottom: 0;
    }

    @media (max-width: 768px) {
        #footer-part {
            text-align: center;
        }
    }

    @media (max-width: 767px) {
        footer .footer-links .col {
            flex: 0 0 auto;
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        footer .footer-links ul {
            margin-bottom: 0;
            padding: 0;
            list-style-type: none;
        }

        footer .footer-links .footer-contact-sec .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            justify-content: center;
        }

        footer .footer-links .col:not(:last-child)::after {
            top: auto;
            bottom: -8px;
            width: 80%;
            left: 0;
            border-bottom: 1px dashed #0b3d91;
            right: 0;
            margin: 0 auto;
        }


        .footerSec::after {
            content: '';
            position: absolute;
            top: -127px;
            left: 0;
            background-size: cover;
            background-repeat: no-repeat;
            width: 140px;
            height: 127px;
            right: 0;
            margin: 0 auto;
        }

        .ptb-50 {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .footerSec p.font-18 {
            font-size: 12px;
            line-height: 1.5;
        }

        .footerSec .footerNoteSec ul li a,
        .footerSec .footerNoteSec p {
            font-size: 12px;
            line-height: 1.5;
        }
    }
</style>

<footer id="footer-part">
    <div class="container">
        <div class="row footer-links text-start">
            <!-- Logo -->

            <!-- About -->
            <div class="col">
                <a href="javascript:void(0);">
                    <!-- <img src="<?php echo base_url(); ?>assets/images/SDTheme.png" class="img-fluid" alt="Sardardham"
                        title="Sardardham"> -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4552.695129127534!2d72.5360352!3d23.1370173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e82bdbd75fc05%3A0xae9cd0d313d6050!2sSardardham!5e1!3m2!1sen!2sin!4v1759930494446!5m2!1sen!2sin"
                        width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </a>
            </div>
            <div class="col mb-4">
                <h4> <?php echo lang('about_us'); ?></h4>
                <ul>
                    <li><a href="<?= base_url('about-us/sardardham-a-thought'); ?>"><?php echo lang('thought'); ?></a></li>
                    <li><a href="<?= base_url('about-us/team-sardardham'); ?>"><?= lang('team'); ?></a></li>
                    <li><a href="<?= base_url('about-us/mission-vision-goal'); ?>"><?= lang('mission_vision_goal'); ?></a></li>
                    <li><a href="<?= base_url('media/event'); ?>"><?= lang('event'); ?></a></li>
                    <li><a href="<?= base_url('donation'); ?>"><?= lang('donation'); ?></a></li>
                    <li><a href="<?= base_url('contact-us'); ?>"><?= lang('connect') ?></a></li>
                </ul>
            </div>

            <!-- Projects & Activities -->
            <div class="col mb-4">
                <h4><?= lang('five_goals') ?></h4>
                <ul>
                    <?php
                    foreach ( $GLOBALS['goals'] as $goal ) {
                        $preFix = $goal->active == 0 ? "our-goals/" : "home/goals/"; ?>
                        <li>
                            <a href="<?= base_url($preFix . urlencode($goal->slug)) ?>">
                                <?= $goal->title ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col">
                <h4> <?php echo lang('activity'); ?></h4>
                <ul>
                    <li>
                        <a href="<?= base_url('activities/students-adoption-scheme'); ?>"
                            class="<?= is_active('activities/students-adoption-scheme') ?>">
                            <?= lang('dikri_datak_yojna_sardardham'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('activities/scholarship-scheme') ?>"
                            class="<?= is_active('activities/scholarship-scheme') ?>">
                            <?= lang('dr_chittaranjanbhai'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('activities/update'); ?>" class="<?= is_active('activities/update') ?>">
                            <?= lang('ek_vichar_magazine'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('activities/revenue-guidance-centre') ?>"
                            class="<?= is_active('activities/revenue-guidance-centre') ?>">
                            <?= lang('revenue_guidance_centre'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('activities/medical-centre'); ?>"
                            class="<?= is_active('activities/medical-centre') ?>">
                            <?= lang('medical_centre'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('activities/business-development-center') ?>"
                            class="<?= is_active('activities/business-development-center') ?>">
                            <?= lang('business_development_center'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('activities/trustee-guest-house') ?>"
                            class="<?= is_active('activities/trustee-guest-house') ?>">
                            <?= lang('trustee_guest_house'); ?>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col mb-4 footer-contact">

                <div class="col">
                    <h4><?= lang('connect') ?></h4>
                    <h4 class="mb-4" style="color: #0b3d91;">Sardardham</h4>

                    <div class="footer-contact-sec">
                        <div class="contact-item">
                            <i class="fa-regular fa-clock" aria-hidden="true"></i>
                            <h5>
                                10 AM to 7 PM </h5>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-phone-volume" aria-hidden="true"></i>
                            <a href="tel:+917575001596">+91-7575001596</a>
                        </div>
                        <div class="contact-item">
                            <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:inquiry.sardardham@gmail.com">inquiry.sardardham@gmail.com</a>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                            <h5>Sardardham, Vaishnodevi Circle, S P Ring Road, Ahmedabad, 382421, Gujarat,India.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* ===== Improved Footer Copyright Section ===== */
        .footer-copyright {
            background: linear-gradient(90deg, #0b3d91 0%, #134b8a 100%);
            color: #ffffff;
            padding: 6px 0;
            font-size: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        .footer-copyright .copyright {
            padding-top: 0;
        }

        .footer-copyright p {
            margin: 0;
            color: #f0f4ff;
            font-weight: 400;
        }

        .footer-copyright a {
            color: #ffffff;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-copyright a:hover {
            color: #bcd3ff;
            text-decoration: underline;
        }

        .footer-copyright .visitor-counter b {
            color: #ffffff;
            /* Golden highlight for Last Update */
        }

        .footer-copyright .animated-counter {
            color: #ffffff;
            /* Neon aqua effect for counter */
            font-weight: bold;
        }


        .footerNoteSec {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        @media (max-width: 767px) {
            .footerNoteSec {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .footer-copyright {
                text-align: center;
            }

            .footer-copyright .col-md-3,
            .footer-copyright .col-md-5,
            .footer-copyright .col-md-4 {
                margin-bottom: 10px;
            }
        }
    </style>

    <!-- ✅ Keep your existing footer bottom HTML exactly as-is -->
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <div class="footerNoteSec">
                        <p>&copy; Copyright <?php echo date("Y"); ?> Sardardham. All Rights Reserved.</p>
                        <?php
                        $last_updated = $this->db->where('id', 1)->get('setting')->row()->last_updated;
                        if (empty($last_updated) || $last_updated == '0000-00-00') {
                            $last_updated = date('d-m-Y');
                        } else {
                            $last_updated = date('d-m-Y', strtotime($last_updated));
                        }
                        ?>

                        <p class="visitor-counter">
                            <b>Last Update : <?php echo $last_updated; ?>&nbsp;&nbsp;</b>
                            Total Visitors:&nbsp;<span id="visitorCounter" class="animated-counter">0</span>
                        </p>

                        <p>Website Developed by:&nbsp;
                            <a href="https://www.ragingdevelopers.com?utm_source=sardardham.org&utm_medium=footer"
                                target="_blank" aria-label="This website is developed by raging developers">
                                <i class="fa fa-heart text-light" aria-hidden="true"></i>&nbsp;
                                <span class="text-white h6">RagingDevelopers</span>
                            </a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

</footer>