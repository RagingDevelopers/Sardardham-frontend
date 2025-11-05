<style>
    body {
        /* background: #f8f9fa; */
    }

    :root {
        --primary: #21559B;
        --primary-light: #3a73b8;
        --primary-dark: #1a447a;
        --accent-glow: rgba(33, 85, 155, 0.3);
        --bg-subtle: rgba(33, 85, 155, 0.05);
    }

    /* ==== Inner Header – Refined Gradient ==== */
    .inner-page {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        color: #fff;
        font-weight: 800;
        font-size: 2.2rem;
        padding: 2.5rem 1rem;
        text-align: center;
        border-bottom: 5px solid var(--primary-dark);
        text-shadow: 0 2px 6px rgba(0, 0, 0, .3);
        letter-spacing: 1.2px;
    }

    /* ==== Section Header ==== */
    .team-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    /* ==== Card Base – Enhanced Smoothness ==== */
    .team-member {
        background: #fff;
        text-align: center;
        padding: 30px 20px;
        border-radius: 18px;
        width: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .team-member::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--primary-light));
        opacity: 0;
        transition: opacity 0.8s ease;
    }

    .team-member:hover::before {
        opacity: 1;
    }

    .team-member img {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 18px;
        border: 5px solid #f0f7f4;
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        box-shadow: 0 6px 16px rgba(0, 0, 0, .12);
    }

    .team-member .name {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: var(--primary);
        transition: all 0.8s ease;
    }

    .team-member .designation {
        font-size: 1.05rem;
        color: #666;
        font-weight: 500;
        background: #f0f7f4;
        padding: 7px 18px;
        border-radius: 30px;
        display: inline-block;
        transition: all 0.8s ease;
    }

    /* 5. Cascade Layer Peel */
    .demo-5 .team-member {
        position: relative;
    }

    .demo-5 .team-member::before,
    .demo-5 .team-member::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 18px;
        background: #21559B;
        opacity: 0;
        transition: all 0.8s ease;
        z-index: -1;
    }

    .demo-5 .team-member::before {
        transform: translateX(-100%);
    }

    .demo-5 .team-member::after {
        transform: translateX(100%);
    }

    .demo-5 .team-member:hover::before {
        transform: translateX(0);
        opacity: 0.7;
    }

    .demo-5 .team-member:hover::after {
        transform: translateX(0);
        opacity: 0.3;
        transition-delay: 0.2s;
    }

    .demo-5 .team-member:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 60px var(--accent-glow);
    }

    .demo-5 .team-member:hover img {
        border-color: var(--primary-light);
        transform: scale(1.08);
    }

    .demo-5 .team-member:hover .name {
        color: #000;
    }

    .demo-5 .team-member:hover .designation {
        background: var(--primary-light);
        color: #fff;
    }
</style>
<div class="inner-page fw-bold text-center">
    <span><?= lang('team_sardardham') ?></span>
</div>

<div class="container py-5">
    <div class="team-header">
        <h2><b><?= lang('team') ?></b></h2>
        <div class="bar mx-auto"></div>
        <p><?= lang('team_title') ?></p>
    </div>
    <div class="row demo-5">
        <?php foreach ($team as $t) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="team-member">
                    <img src="<?= base_url() ?>upload/<?= $t['photo']; ?>" alt="<?= $t['name']; ?>">
                    <div class="name"><?= $t['name']; ?></div>
                    <div class="designation"><?= $t['designation']; ?></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>