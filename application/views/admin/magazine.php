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
                <h3 class="card-title">Magazine</h3>
            </div>
            <form
                action="<?php if (isset($row_data)) {
                    echo base_url() . 'admin/magazine/update/' . $row_data['id'];
                } else {
                    echo base_url() . 'admin/magazine/create';
                } ?>"
                method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">English Title<span class="text-danger">*</span></label>
                                <input type="text" name="eng_title"
                                    value="<?php if (isset($row_data)) {
                                        echo $row_data['eng_title'];
                                    } ?>"
                                    class="form-control" id="" placeholder="Enter title in English" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gujarati Title<span class="text-danger">*</span></label>
                                <input type="text" name="guj_title"
                                    value="<?php if (isset($row_data)) {
                                        echo $row_data['guj_title'];
                                    } ?>"
                                    class="form-control" id="" placeholder="Enter title in Gujarati" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Year in English<span class="text-danger">*</span></label>
                                <input type="text" name="eng_year"
                                    value="<?php if (isset($row_data)) {
                                        echo $row_data['eng_year'];
                                    } ?>"
                                    class="form-control" id="" placeholder="Enter Year in English" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Year in Gujarati<span class="text-danger">*</span></label>
                                <input type="text" name="guj_year"
                                    value="<?php if (isset($row_data)) {
                                        echo $row_data['guj_year'];
                                    } ?>"
                                    class="form-control" id="" placeholder="Enter Year in Gujarati" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile11">Photo<span class="text-danger">*</span>&nbsp;&nbsp;(301px X 417
                            px)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="exampleInputFile1" <?php if (!isset($row_data)) {
                                    echo 'required';
                                } ?>>
                                <label class="custom-file-label" for="">Choose Photo</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">PDF<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="pdf" class="custom-file-input" id="exampleInputFile" <?php if (!isset($row_data)) {
                                    echo 'required';
                                } ?>>
                                <label class="custom-file-label" for="">Choose file</label>
                            </div>
                        </div>
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
            <h3 class="card-title">Magazine Table</h3>
        </div>
        <div class="card-body p-3">
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
        // Initialize DataTable
        $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('admin/Magazine/fetch_data'); ?>",
                "type": "POST",
                "data": function (d) {
                    // d.document_category = $('#categoryFilter').val(); // Send the selected language filter
                }
            },
            "columns": [
                { "title": "Id" },
                { "title": "Action", "orderable": false },
                { "title": "English Title" },
                { "title": "Gujarati Title" },
                { "title": "English Year" },
                { "title": "Gujarati Year" },
                { "title": "Photo", "orderable": false },
                { "title": "Pdf", "orderable": false },
            ]
        });

        // Filter by language when dropdown changes
        // $('#categoryFilter').change(function() {
        //     $('#datatable').DataTable().ajax.reload(); // Reload the data
        // });
    });
</script>