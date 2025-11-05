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
    <div class="col-md-12 pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Dikri Dattak Yojna</h3>
            </div>
            <form action="<?php if (isset($row_data)) {
                echo base_url() . 'admin/dikri_dattak_yojna/update/' . $row_data['id'];
            } else {
                echo base_url() . 'admin/dikri_dattak_yojna/create';
            } ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="language">Language <span class="text-danger">*</span></label>
                        <select name="language_id" class="form-control" id="language" required>
                            <option value="">Select Language</option>
                            <?php
                            if (isset($languages) && !empty($languages)) {
                                foreach ($languages as $lang) { ?>
                                    <option value="<?= $lang['id'] ?>" <?= ((isset($row_data) && ($row_data['language_id'] == $lang['id'])) ? "selected" : "") ?>><?= $lang['name'] ?>
                                    </option>
                                <? }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description<span class="text-danger">*</span></label>
                        <textarea name="description" id="description" required>
                            <?php if (isset($row_data)) {
                                echo $row_data['description'];
                            } ?>
                        </textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title">Dikri Dattak Yojna Table</h3>
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
    $('#exampleInputFile1').bind('change', function () {
        var size = this.files[0].size;
        if (size <= 314627000) {
        } else {
            alert("Maximum Size Is 307 KB");
            this.value = null;
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('#description').summernote({
            placeholder: 'Start typing here...',
            tabsize: 2,
            height: 120
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('admin/dikri_dattak_yojna/fetch_data'); ?>",
                "type": "POST",
                "data": function (d) {
                    d.language = $('#languageFilter').val(); // Send the selected language filter
                }
            },
            "columns": [
                { "title": "Id" },
                { "title": "Action", "orderable": false },
                { "title": "Language" },
                { "title": "Description" },
            ]
        });

        // Filter by language when dropdown changes
        $('#languageFilter').change(function () {
            $('#datatable').DataTable().ajax.reload(); // Reload the data
        });
    });
</script>