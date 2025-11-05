<style>
    ::marker {
        font-size: 15;
    }

    .about-cont p {
        padding-top: 0px !important;
    }
</style>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="mb-3">
            <?php if ($this->session->flashdata('flash_message') != "") {
                $message = $this->session->flashdata('flash_message'); ?>
                <div class="alert alert-<?= $message['class']; ?> alert-dismissible" role="alert">
                    <div>
                        <h5 class="alert-title"><?= $message['message']; ?></h5>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
                <?php $this->session->set_flashdata('flash_message', "");
            } ?>
        </div>
    </div>

    <section id="about-part" class="pt-40 pb-0">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <h2><b><?= lang('donation') ?></b></h2>
                <div class="bar"></div>
            </div>
            <div class="col-12">
                <div class="about-cont bg-white">
                    <p style="color:black; overflow:hidden;" data-aos="fade-up" data-aos-duration="1000">
                        <?= $donation_description->description ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-5">
                <table class="table table-bordered">
                    <tbody>
                        <?php foreach ($donation_type as $key => $value) { ?>
                            <tr>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['amount'] ?></td>
                                <td>
                                    <a href="#" type="button" class="btn btn-primary btn-sm"
                                        style="background-color: #21559b; border-radius: 8px; padding: 8px; font-size: 0.9rem;"
                                        data-toggle="modal" data-target="#exampleModalCenter">Donate</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-7">
                <?php
                $CI = &get_instance();
                $language_id = $CI->session->userdata('language_id') ?? 1;
                ?>
                <table class="table table-bordered">
                    <tbody>
                        <?php if ($language_id == 1) { ?>
                            <tr>
                                <td>Dikari dattak yojana</td>
                                <td>Annual Cost ₹51,000 per daughter X</td>
                                <td><input type="number" min="1" value="1" class="count-input" data-amount="51000"
                                        data-name="Dikari dattak yojana"></td>
                                <td>
                                    <a href="#" type="button" class="btn btn-primary btn-sm donate-btn"
                                        style="background-color: #21559b; border-radius: 8px; padding: 8px; font-size: 0.9rem;">Donate</a>
                                </td>
                            </tr>
                        <?php } else if ($language_id == 2) { ?>
                                <tr>
                                    <td>દીકરી દતક યોજના</td>
                                    <td>એક દીકરીના માટે રૂપિયા ૫૧,૦૦૦ X</td>
                                    <td><input type="number" min="1" value="1" class="count-input" data-amount="51000"
                                            data-name="દીકરી દતક યોજના"></td>
                                    <td>
                                        <a href="#" type="button" class="btn btn-primary btn-sm donate-btn"
                                            style="background-color: #21559b; border-radius: 8px; padding: 8px; font-size: 0.9rem;">Donate</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>દીકરી સ્વાવલંબન યોજના</td>
                                    <td>એક દીકરીના માટે રૂપિયા ૫૫,૦૦૦ X</td>
                                    <td><input type="number" min="1" value="1" class="count-input" data-amount="55000"
                                            data-name="દીકરી સ્વાવલંબન યોજના"></td>
                                    <td>
                                        <a href="#" type="button" class="btn btn-primary btn-sm donate-btn"
                                            style="background-color: #21559b; border-radius: 8px; padding: 8px; font-size: 0.9rem;">Donate</a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 12px; text-align: center;">
            <div class="modal-header" style="border-bottom: none; display: flex; justify-content: center;">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold; font-size: 1.5rem;">Jai Maa
                    Umiya</h5> -->
            </div>
            <div class="modal-body"
                style="font-size: 1.2rem; color: #333; padding: 20px; font-weight: bold; line-height: 1.6; word-spacing: 1px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);">
                This amount of donation will not be payable online. <br>
                Please contact <span style="color: #d9534f;">Sardardham Head Office - Ahmedabad</span> <br>
                or Call on <br>
                <span style="font-size: 1.3rem; color: #d9534f; font-weight: bold;">+91 98250 33927</span>.
            </div>
            <div class="modal-footer" style="border-top: none; justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="background-color: #d9534f; color: white; border-radius: 8px; padding: 10px 20px; font-size: 1rem; transition: background-color 0.3s;">
                    Ok
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.donate-btn').on('click', function (e) {
            e.preventDefault();

            var $row = $(this).closest('tr');
            var input = $row.find('.count-input');
            var count = parseInt(input.val()) || 1;
            var amount = parseInt(input.data('amount'));
            var name = input.data('name');
            var total = count * amount;

            var form = $('<form action="<?= base_url('sardardham/donation_details') ?>" method="POST"></form>');
            form.append('<input type="hidden" name="count" value="' + count + '">');
            form.append('<input type="hidden" name="total" value="' + total + '">');
            form.append('<input type="hidden" name="name" value="' + name + '">');
            $('body').append(form);
            form.submit();
        });
    });
</script>