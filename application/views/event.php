<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

    .card1 {
        margin: 10px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        width: auto;
    }

    .card1-header img {
        width: 100%;
        height: 397px;
        /*object-fit: cover;*/
    }

    .card1-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .teamCard img {
        -webkit-mask-image: linear-gradient(45deg, #000 25%, rgba(0, 0, 0, .2) 50%, #000 75%);
        mask-image: linear-gradient(45deg, #000 25%, rgba(0, 0, 0, .2) 50%, #000 75%);
        -webkit-mask-size: 800%;
        mask-size: 800%;
        -webkit-mask-position: 0;
        mask-position: 0;
    }

    .teamCard img:hover {
        transition: mask-position 2s ease, -webkit-mask-position 1.5s ease;
        -webkit-mask-position: 120%;
        mask-position: 120%;
        opacity: 1;
    }

    .card1 {
        transition: all 0.4s linear 0s;

    }

    .card1:hover {
        transform: scale(1.05);
        border-color: #1369ce;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.6s ease;
    }

    .btn.active {
        border: 2px solid #21559B;
        background-color: #21559B;
        color: #fff;
    }

    @media screen and (max-width:768px) {
        .teamCard img {
            width: 150px;
            height: 150px;
        }
    }

    @media only screen and (max-width: 600px) {
        .inner-page {
            font-size: 29px;
            padding: 2rem !important;
        }
    }


    /* Fallback for no events */
</style>
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;">
    <span class="">
        <?= lang('event') ?>
    </span>
</div>

<div class="container pt-2">
    <div class="text-center my-4">
        <a href="<?= base_url('update/event?filter=current'); ?>"
            class="btn btn-primary me-1 <?= $filter !== 'archive' ? 'active' : ''; ?>"><?= lang('current') ?>
        </a>
        <a href="<?= base_url('update/event?filter=archive'); ?>"
            class="btn btn-secondary <?= $filter === 'archive' ? 'active' : ''; ?>"><?= lang('archive') ?>
        </a>
    </div>
    <div class="row">
        <?php if (count($events) > 0) { ?>
            <?php for ($x = 0; $x < count($events); $x++) { ?>
                <div class="col-md-4 mb-4"
                    data-aos="<?php echo $x % 3 === 0 ? 'fade-up-right' : ($x % 3 === 1 ? 'fade-up' : 'fade-up-left'); ?>">
                    <div class="card1 shadow-sm border-0 h-100" style="border-radius: 10px;">
                        <div class="card1-header position-relative">
                            <img loading="lazy" src="<?= base_url() ?>upload/<?= $events[$x]['photo']; ?>"
                                alt="<?= $events[$x]['title']; ?>" class="img-fluid rounded-top">
                        </div>
                        <div class="card1-body p-3">
                            <?php
                            $eventId = $events[$x]['id'];
                            $buttonText = $events[$x]['title'];
                            $buttonStyle = 'btn m-0 text-white w-100';
                            $buttonGradient = 'background:linear-gradient(90deg,#0e9ea8 0,#43e794 100%);border-radius:4px;transition:.5s;';
                            $buttonURL = '';

                            // Event-specific links
                            if ($eventId == 17) {
                                $buttonURL = "https://docs.google.com/forms/d/e/1FAIpQLSd83vhPkJFpYcqKDNTl4eZ3Z0MyN85LVwdtdWeYXkm43v12ew/viewform?usp=sf_link";
                            } elseif ($eventId == 18) {
                                $buttonURL = "https://docs.google.com/forms/d/e/1FAIpQLSegDTdl4YJ4JAH2yI5-_BA8hnFHFLoRuBwnLO_tT17H5cLF-g/viewform";
                            } elseif ($eventId == 22) {
                                $buttonURL = "https://surveyheart.com/form/64ce0a7c580e0764a71c0d60";
                            } elseif ($eventId == 24) {
                                $buttonURL = "https://forms.gle/PAEy3spk7ZvB4S2JA";
                            } elseif ($eventId == 29) {
                                $buttonURL = "https://surveyheart.com/form/658abf859b1a133d1699a027";
                            } elseif ($eventId == 30) {
                                $buttonURL = "https://forms.gle/SPcqzMkmxG9v26KF6";
                            } elseif ($eventId == 38) {
                                $buttonURL = "https://forms.gle/jYUFo6z8LAfcRxC49";
                            } elseif ($eventId == 40) {
                                $buttonURL = "https://forms.gle/F7aXQpGx5wBrFNsH6";
                            } elseif ($eventId == 44) {
                                $buttonURL = "https://forms.gle/yd7qFabH8oGMcWEz6";
                            } else {
                                // Fallback if there's a PDF available
                                if (file_exists(base_url() . 'upload/' . $events[$x]['pdf'])) {
                                    $buttonURL = base_url() . 'upload/' . $events[$x]['pdf'];
                                } else {
                                    $buttonURL = "javascript:void(0);";
                                }
                            }
                            ?>
                            <a href="<?= $buttonURL; ?>" target="_blank" class="<?= $buttonStyle ?>"
                                style="<?= $buttonGradient ?>"><?= $buttonText; ?></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <!-- Fallback if no events available -->
            <div class="col-12 text-center my-5">
                <div class="no-available alert">
                    <h4>No Events Available</h4>
                    <p>Check back later for updates on upcoming events.</p>
                    <a href="/" class="btn-back-home">Back to Home</a>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<script>
    $(() => {
        AOS.init({
            duration: 400,  // Animation duration in milliseconds
            easing: 'ease-in-out',
            delay: 70,
        });
    })
</script>