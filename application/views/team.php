<style>
  @media only screen and (max-width: 600px) {
    .inner-page {
      font-size: 29px;
      padding: 2rem !important;
    }
  }

  .our-team {
    padding: 30px 0 40px;
    margin-bottom: 30px;
    background-color: #f0f7f4;
    /* Softer color for a more modern look */
    text-align: center;
    overflow: hidden;
    position: relative;
    max-height: 344px;
    min-height: 343px;
    border-radius: 12px;
    transition: all 0.4s linear 0s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Subtle shadow for a 3D effect */
    border: 1px solid transparent;
  }

  .our-team:hover {
    transform: scale(1.05);
    border-color: #1369ce;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    transition: all 0.6s ease;
  }

  .our-team .picture {
    display: inline-block;
    height: 150px;
    width: 150px;
    margin-bottom: 30px;
    z-index: 1;
    position: relative;
  }

  .our-team .picture::before {
    content: "";
    width: 100%;
    height: 0;
    border-radius: 50%;
    background-color: #1369ce;
    position: absolute;
    bottom: 135%;
    right: 0;
    left: 0;
    opacity: 0.9;
    transform: scale(3);
    transition: all 0.3s linear 0s;

  }

  .our-team .picture::before {
    height: 100%;
  }

  .our-team .picture::after {
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #f0f7f4;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
  }

  .our-team .picture img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    transform: scale(1);
    transition: all 0.9s ease 0s;
  }

  .our-team:hover .picture img {
    box-shadow: 0 0 0 7px #f0f7f4;
    /*transform: scale(0.7);*/
    transform: scale(1.1)
  }

  .our-team .title {
    display: block;
    font-size: 15px;
    color: #4e5052;
    text-transform: capitalize;
  }

  .our-team .social {
    width: 100%;
    padding: 0;
    margin: 0;
    background-color: #1369ce;
    position: absolute;
    bottom: -100px;
    left: 0;
    transition: all 0.5s ease 0s;
  }

  .our-team .social {
    bottom: 0;
  }

  .our-team:hover .picture::before {
    background-color: rgba(19, 105, 206, 0.8);
  }

  .our-team .social li {
    display: inline-block;
  }

  .our-team .social li a {
    display: block;
    padding: 10px;
    font-size: 17px;
    color: white;
    transition: all 0.3s ease 0s;
    text-decoration: none;
  }

  .our-team .social li {
    color: #1369ce;
    transform: translateY(-3px);
    /* Adds a slight lift animation */

    background-color: #f7f5ec;
  }

  .team-content h5 {
    font-family: 'Mukta Vaani', sans-serif;

  }
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@400;800&display=swap" rel="stylesheet">
<!-- background-image: url('<?= base_url("upload/web_new.png"); ?>');  -->
<div class="inner-page fw-bold text-center" style="background-color: #E1E1E1;color: #21559B;"><span
    class=""><?= lang('team_sardardham') ?></span>
</div>


<div class="container py-2">
  <div class="row">
    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
      <h2><b><?= lang('team_sardardham') ?></b></h2>
      <div class="bar mx-auto"></div>
      <p style="margin-bottom:20px;"><?= lang('team_title') ?></p>
    </div>
  </div>
  <div class="row">
    <?php for ($x = 0; $x < count($team); $x++) { ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="our-team">
          <div class="picture mb-4">
            <img loading="lazy" src="<?= base_url() ?>upload/<?= $team[$x]['photo']; ?>" alt="img">
          </div>
          <div class="team-content">
            <span class="name h5"><?= $team[$x]['name']; ?></span>
            <span class="title h6 p-1"><?= $team[$x]['designation']; ?></span>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>