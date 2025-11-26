<?php
$CI = &get_instance();
$language_id = $CI->session->userdata('language_id') ?? 1;
?>
<style>
    ::marker {
        font-size: 15px;
    }


    .about-cont p {
        padding-top: 0px !important;
    }

    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
    }
</style>

<style>
    /* Custom Styling */
    .custom-card {
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .custom-card-header {
        background: linear-gradient(135deg, #21559b, #3a76c8);
        color: white;
        font-size: 1.2rem;
        padding: 15px;
        text-align: center;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .donor-form-container {
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .btn-custom {
        font-size: 0.9rem;
        font-weight: bold;
        padding: 8px 20px;
        border-radius: 6px;
        background-color: #28a745;
        border: none;
        transition: 0.3s;
    }

    .btn-custom:hover {
        background-color: #218838;
    }

    .icon {
        margin-right: 8px;
        color: #007bff;
    }

    .submit-btn-container {
        text-align: right;
        margin-top: 15px;
    }
</style>
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
        class=""><?= lang('dikri_datak_yojna_sardardham') ?></span>
</div>

<div class="container mt-4">
    <div class="form-group" style="color: #111;" data-aos="fade-right" data-aos-duration="1000">
        <div class="text-center pt-4 mb-0">
            <h2><?= lang('students_adoption_title') ?></h2>
            <div class="bar mx-auto"></div>
            <p><?= lang('students_adoption_sub_title_1') ?></p>
        </div>
        <br>
        <p style="color: #111;"><?= lang('students_adoption_1') ?></p>
        <p style="color: #111;"><?= lang('students_adoption_2') ?></p>
        <br>
        <h5><?= lang('students_adoption_sub_title_2') ?></h5>
        <p style="color: #111;"><?= lang('students_adoption_3') ?></p>
        <img src="/assets/General.jpg" alt="Demo Image" width="500">
        <br>
        <br>
        <h5><?= lang('students_adoption_sub_title_3') ?></h5>
        <ul style="list-style-type: none;">
            <li><?= lang('students_adoption_receive_1') ?></li>
            <li><?= lang('students_adoption_receive_2') ?></li>
            <li><?= lang('students_adoption_receive_3') ?></li>
            <li><?= lang('students_adoption_receive_4') ?></li>
            <li><?= lang('students_adoption_receive_5') ?></li>
        </ul>
        <br>
        <h5><?= lang('students_adoption_sub_title_4') ?></h5>
        <ui style="list-style-type: none;">
            <li><?= lang('students_adoption_works_1') ?></li>
            <li><?= lang('students_adoption_works_2') ?></li>
            <li><?= lang('students_adoption_works_3') ?></li>
            <li><?= lang('students_adoption_works_4') ?></li>
        </ui>
        <br>
        <p style="color: #111;"><?= lang('students_adoption_4') ?></p>
        <br>
        <h5><?= lang('students_adoption_sub_title_5') ?></h5>
        <p style="color: #111;"><?= lang('students_adoption_5') ?></p>
        <br>
        <h5><?= lang('students_adoption_sub_title_6') ?></h5>
        <ui style="list-style-type: none;">
            <li><?= lang('students_adoption_scheme_1') ?></li>
            <li><?= lang('students_adoption_scheme_2') ?></li>
            <li><?= lang('students_adoption_scheme_3') ?></li>
            <li><?= lang('students_adoption_scheme_4') ?></li>
            <li><?= lang('students_adoption_scheme_5') ?></li>
        </ui>
        <br>
        <h5><?= lang('students_adoption_sub_title_7') ?></h5>
        <p style="color: #111;"><?= lang('students_adoption_6') ?></p>
    </div>

    <!-- Donor Form Card -->
    <div class="card custom-card donor-form-container">
        <div class="custom-card-header">
            <i class="fas fa-user"></i>
            <?php echo ($language_id == 1) ? "Donor Information Form" : "દાતાની માહિતી ફોર્મ"; ?>
        </div>
        <div class="card-body">
            <form action="<?= base_url("Sardardham/add_donor"); ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fas fa-user icon"></i>
                                <?php echo ($language_id == 1) ? 'Full Name of Donor' : 'દાતાનું સંપૂર્ણ નામ'; ?>
                            </label>
                            <input type="hidden" name="no_of_people" value="">
                            <input type="hidden" name="amount" value="">
                            <input type="text" name="name" class="form-control"
                                placeholder="<?php echo ($language_id == 1) ? 'Enter your name' : 'તમારું નામ લખો'; ?>"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fas fa-map-marker-alt icon"></i>
                                <?php echo ($language_id == 1) ? 'Full Address of Donor' : 'દાતાનું પૂરું સરનામું'; ?>
                            </label>
                            <textarea name="address" class="form-control" rows="3"
                                placeholder="<?php echo ($language_id == 1) ? 'Enter your address' : 'તમારું સરનામું લખો'; ?>"
                                autocomplete="off" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fab fa-whatsapp icon"></i>
                                <?php echo ($language_id == 1) ? 'WhatsApp Number' : 'વોટ્સએપ નંબર'; ?>
                            </label>
                            <input type="tel" name="whats_app_no" class="form-control" pattern="[0-9]{10}"
                                placeholder="<?php echo ($language_id == 1) ? 'Enter your WhatsApp number' : 'વોટ્સએપ નંબર લખો'; ?>"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fas fa-id-card icon"></i>
                                <?php echo ($language_id == 1) ? 'PAN Card Number' : 'પાન કાર્ડ નંબર'; ?>
                            </label>
                            <input type="text" name="pan_no" class="form-control" maxlength="10"
                                placeholder="<?php echo ($language_id == 1) ? 'Enter PAN card number' : 'પાન કાર્ડ નંબર લખો'; ?>"
                                autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fas fa-fingerprint icon"></i>
                                <?php echo ($language_id == 1) ? 'Aadhaar Card Number' : 'આધાર કાર્ડ નંબર'; ?>
                            </label>
                            <input type="text" name="aadhaar_no" class="form-control" maxlength="12"
                                placeholder="<?php echo ($language_id == 1) ? 'Enter Aadhaar number' : 'આધાર નંબર લખો'; ?>"
                                autocomplete="off">
                        </div>
                    </div>
                </div>

                <!-- Submit Button at the End of Form -->
                <div class="submit-btn-container">
                    <button type="submit" class="btn btn-custom">
                        <?php echo ($language_id == 1) ? 'Submit' : 'સબમિટ કરો'; ?>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- <div class="form-group d-flex justify-content-center">
        <button class="btn btn-primary">Payment Button</button>
    </div> -->
</div>





<section id="building-projects" class="pt-20 pb-20">
    <div class="text-center mb-2">
        <h2><b><?= lang('dikri_datak_yojna_sardardham'); ?></b></h2>
        <h3><b><?= lang('students_adoption_title_1'); ?></b></h3>
        <div class="bar mx-auto"></div>
        <p>
            <?= lang('students_adoption_sub_title_1'); ?>
        </p>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <span>
            <?= lang('students_adoption_1'); ?>
        </span>
        <span>
            <?= lang('students_adoption_2'); ?>
        </span>
        <span>
            <?= lang('students_adoption_3'); ?>
        </span>
    </div>

    <!-- <div class="mt-1 mb-4">
        <div class="project text-center mt-5">
            <div class="image-container mt-3">
                <img src="/assets/images/goals/GPBO.jpg" class="img-fluid rounded shadow project-img"
                    alt="Image-not-found">
            </div>
        </div>
    </div> -->

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mb-3">
        <div class="mb-2 mt-3">
            <h2><b><?= lang('students_adoption_sub_title_2'); ?></b></h2>
            <div class="bar mx-auto"></div>
        </div>
        <span>
            <?= lang('students_adoption_7'); ?>
        </span>
    </div>

    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mt-2">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center mb-2 mt-3">
                    <h2><b><?= lang('students_adoption_sub_title_3'); ?></b></h2>
                    <div class="bar mx-auto"></div>
                </div>
                <span>
                    <ul>
                        <li><?= lang('students_adoption_receive_1'); ?></li>
                        <li><?= lang('students_adoption_receive_2'); ?></li>
                        <li><?= lang('students_adoption_receive_4'); ?></li>
                        <li><?= lang('students_adoption_receive_5'); ?></li>
                    </ul>
                </span>
            </div>
            <div class="col-md-6">
                <div class="text-center mb-2 mt-3">
                    <h2><b><?= lang('students_adoption_sub_title_4'); ?></b></h2>
                    <div class="bar mx-auto"></div>
                </div>
                <span>
                    <ul>
                        <li><?= lang('students_adoption_works_1'); ?></li>
                        <li><?= lang('students_adoption_works_2'); ?></li>
                        <li><?= lang('students_adoption_works_3'); ?></li>
                        <li><?= lang('students_adoption_works_4'); ?></li>
                    </ul>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <span>
                    <?= lang('gpbs_last_line'); ?>
                </span>
            </div>
        </div>

        <div class="content-box bg-light p-4 rounded-3 shadow-sm mx-auto mb-2 mt-4 text-center">
            <h3><b><?= lang('students_adoption_sub_title_6'); ?></b></h3>
            <div class="bar mx-auto"></div>
            <span>
                <ul>
                    <li><?= lang('students_adoption_scheme_1'); ?></li>
                    <li><?= lang('students_adoption_scheme_2'); ?></li>
                    <li><?= lang('students_adoption_scheme_3'); ?></li>
                    <li><?= lang('students_adoption_scheme_4'); ?></li>
                </ul>
            </span>
        </div>
    </div>



    <!-- GPBS Glimpses Section -->
    <div class="content-box bg-white p-4 rounded-3 shadow-sm mx-auto mt-3">
        <div class="text-center mb-3">
            <h2><b><?= lang('students_adoption_sub_title_5'); ?></b></h2>
            <div class="bar mx-auto"></div>
            <p>Watch the highlights of GPBS from past years</p>
        </div>
        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="https://www.youtube.com/watch?v=63NfBHoEzKg" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2018
            </a>
            <a href="https://youtu.be/yFIKPOZFSpU" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2020
            </a>
            <a href="https://youtu.be/wbhFtFfDZYQ" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2022
            </a>
            <a href="https://youtu.be/w38OnaJlJh4" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2024
            </a>
            <a href="https://youtu.be/-POWIgyx8pY" target="_blank" class="btn btn-primary btn-lg">
                GPBS 2025
            </a>
        </div>
    </div>

</section>

<style>
    #building-projects {
        scroll-margin-top: 80px;
    }

    #cscCarousel img {
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    #building-projects .project {
        max-width: 90%;
        margin: 0 auto;
    }

    #building-projects .image-container {
        width: 100%;
        /* max-height: 444px; */
        overflow: hidden;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .content-box {
        max-width: 90%;
        font-size: 18px;
        line-height: 1.7;
    }

    #building-projects .project-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.35s ease;
    }

    #building-projects .project-img:hover {
        transform: scale(1.05);
    }

    .btn-primary {
        border-radius: 50px;
        padding: 12px 25px;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0047ab;
        transform: scale(1.05);
    }
</style>