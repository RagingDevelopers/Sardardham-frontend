<div class="container">
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
    <div class="col-md-12 pt-2">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">slider</h3>
            </div>
            <form action="<?php if (isset($row_data)) {
                echo base_url() . 'admin/slider/update/' . $row_data['id'];
            } else {
                echo base_url() . 'admin/slider/create';
            } ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="language">Language <span class="text-danger">*</span></label>
                                <select name="language" class="form-control" id="language" required>
                                    <option value="">Select Language</option>
                                    <?php
                                    if (isset($languages) && !empty($languages)) {
                                        foreach ($languages as $lang) { ?>
                                            <option value="<?= $lang['id'] ?>" <?= ((isset($row_data) && ($row_data['language_id'] == $lang['id'])) ? "selected" : "") ?>>
                                                <?= $lang['name'] ?>
                                            </option>
                                        <? }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" value="<?php if (isset($row_data)) {
                                    echo $row_data['title'];
                                } ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Sub Title</label>
                                <input type="text" name="sub_title" value="<?php if (isset($row_data)) {
                                    echo $row_data['sub_title'];
                                } ?>" class="form-control" id="exampleInputEmail2" placeholder="Enter title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo_desktop">Desktop Image <span
                                        class="text-danger">*</span>&nbsp;&nbsp;(1920px X 800px)</label>
                                <div class="custom-file">
                                    <input type="file" name="photo_desktop" class="custom-file-input" id="photo_desktop"
                                        <?php if (!isset($row_data)) {
                                            echo 'required';
                                        } ?>>
                                    <label class="custom-file-label" for="photo_desktop">Choose Desktop Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo_tablet">Tablet Image <span
                                        class="text-danger">*</span>&nbsp;&nbsp;(1280px X 600px)</label>
                                <div class="custom-file">
                                    <input type="file" name="photo_tablet" class="custom-file-input" id="photo_tablet"
                                        <?php if (!isset($row_data)) {
                                            echo 'required';
                                        } ?>>
                                    <label class="custom-file-label" for="photo_tablet">Choose Tablet Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo_mobile">Mobile Image <span
                                        class="text-danger">*</span>&nbsp;&nbsp;(720px X 1280px)</label>
                                <div class="custom-file">
                                    <input type="file" name="photo_mobile" class="custom-file-input" id="photo_mobile"
                                        <?php if (!isset($row_data)) {
                                            echo 'required';
                                        } ?>>
                                    <label class="custom-file-label" for="photo_mobile">Choose Mobile Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputFile">Photo<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="exampleInputFile1" < if (!isset($row_data)) {
                                    echo 'required';
                                } ?>>
                                <label class="custom-file-label" for="exampleInputFile1">Choose Photo</label>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="card-footer">
                    <button type="submit" id="submit" class="btn btn-primary submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title">slider Table</h3>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="languageFilter">Filter by Language:</label>
                    <select id="languageFilter" class="form-control">
                        <option value="">All Languages</option>
                        <!-- Populate dropdown options dynamically from $languages -->
                        <?php foreach ($languages as $language): ?>
                            <option value="<?= $language['id']; ?>"><?= $language['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <table class="table table-striped" id="datatable">


            </table>
        </div>
    </div>
</div>
<script>
    //  $(".submit").on("click", function () {
    $('#exampleInputFile1').bind('change', function () {
        var size = this.files[0].size;
        if (size <= 314627) {

        } else {
            alert("Maximum Size Is 307 KB");
            this.value = null;
        }

        // });
    });

</script>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('admin/Slider/fetch_data'); ?>",
                "type": "POST",
                "data": function (d) {
                    d.language = $('#languageFilter').val(); // Send the selected language filter
                }
            },
            "columns": [
                { "title": "Id" },
                { "title": "Action", "orderable": false },
                { "title": "Language" },
                { "title": "Title" },
                { "title": "Sub Title" },
                { "title": "Images", "orderable": false },
            ]
        });

        // Filter by language when dropdown changes
        $('#languageFilter').change(function () {
            $('#datatable').DataTable().ajax.reload(); // Reload the data
        });


    });
</script>