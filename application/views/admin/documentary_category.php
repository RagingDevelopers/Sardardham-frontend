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
                <h3 class="card-title">Documentary Category</h3>
            </div>
            <form action="<?php if (isset($row_data)) {
                echo base_url() . 'admin/documentary_category/update/' . $row_data['id'];
            } else {
                echo base_url() . 'admin/documentary_category/create';
            } ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class="form-group">
                            <label for="">English Name<span class="text-danger">*</span></label>
                            <input type="text" name="eng_name" value="<?php if (isset($row_data)) {
                                echo $row_data['eng_name'];
                            } ?>" class="form-control" id="" placeholder="Enter name" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Gujarati Name<span class="text-danger">*</span></label>
                            <input type="text" name="guj_name" value="<?php if (isset($row_data)) {
                                echo $row_data['guj_name'];
                            } ?>" class="form-control" id="" placeholder="Enter name" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Year in English<span class="text-danger">*</span></label>
                            <input type="text" name="eng_year" value="<?php if (isset($row_data)) {
                                echo $row_data['eng_year'];
                            } ?>" class="form-control" id="" placeholder="Enter Year in English" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Year in Gujarati<span class="text-danger">*</span></label>
                            <input type="text" name="guj_year" value="<?php if (isset($row_data)) {
                                echo $row_data['guj_year'];
                            } ?>" class="form-control" id="" placeholder="Enter Year in Gujarati" autocomplete="off"
                                required>
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
            <h3 class="card-title">Documentary Category Table</h3>
        </div>
        <div class="card-body p-3 table-responsive">
            <table class="table table-striped" id="datatable">


            </table>
        </div>
    </div>
</div>
<script>
    $('#exampleInputFile1').bind('change', function () {
        var size = this.files[0].size;
        if (size <= 314627) {
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
                "url": "<?php echo base_url('admin/documentary_category/fetch_data'); ?>",
                "type": "POST",
                "data": function (d) {
                    // d.document_category = $('#categoryFilter').val(); // Send the selected language filter
                }
            },
            "columns": [
                { "title": "Id" },
                { "title": "Action", "orderable": false },
                { "title": "English Name" },
                { "title": "Gujarati Name" },
                { "title": "English Year" },
                { "title": "Gujarati Year" },
                { "title": "Created At" },
            ]
        });

        // Filter by language when dropdown changes
        // $('#categoryFilter').change(function() {
        //     $('#datatable').DataTable().ajax.reload(); // Reload the data
        // });
    });
</script>