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
                <h3 class="card-title"><?= $page_title; ?></h3>
            </div>
            <form action="<?php if (isset($row_data)) {
                echo base_url() . 'admin/New_philanthropist/update/' . $row_data['id'];
            } else {
                echo base_url() . 'admin/New_philanthropist/create';
            } ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">English Name<span class="text-danger">*</span></label>
                                <input type="text" name="eng_name" value="<?php if (isset($row_data)) {
                                    echo $row_data['eng_name'];
                                } ?>" class="form-control" id="" placeholder="Enter name in English">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gujarati Name<span class="text-danger">*</span></label>
                                <input type="text" name="guj_name" value="<?php if (isset($row_data)) {
                                    echo $row_data['guj_name'];
                                } ?>" class="form-control" id="" placeholder="Enter name in Gujarati">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">English Company Name<span class="text-danger">*</span></label>
                                <input type="text" name="eng_company" value="<?php if (isset($row_data)) {
                                    echo $row_data['eng_company'];
                                } ?>" class="form-control" id="" placeholder="Enter company in English">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gujarati Company Name<span class="text-danger">*</span></label>
                                <input type="text" name="guj_company" value="<?php if (isset($row_data)) {
                                    echo $row_data['guj_company'];
                                } ?>" class="form-control" id="" placeholder="Enter company in Gujarati">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">City<span class="text-danger">*</span></label>
                                <select name="city_id" id="city_id" class="form-select">
                                    <option value="">Select City</option>
                                    <?php foreach ($cities as $city) { ?>
                                        <option value="<?= $city['id']; ?>" <?php if (isset($row_data) && $row_data['city_id'] == $city['id'])
                                              echo 'selected'; ?>>
                                            <?= $city['eng_name']; ?> (<?= $city['guj_name']; ?>)
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Category<span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category['id']; ?>" <?php if (isset($row_data) && $row_data['category_id'] == $category['id'])
                                              echo 'selected'; ?>>
                                            <?= $category['eng_name']; ?> (<?= $category['guj_name']; ?>)
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Zone<span class="text-danger">*</span></label>
                                <select name="zone_id" id="zone_id" class="form-select">
                                    <option value="">Select Zone</option>
                                    <?php foreach ($zones as $zone) { ?>
                                        <option value="<?= $zone['id']; ?>" <?php if (isset($row_data) && $row_data['zone_id'] == $zone['id'])
                                              echo 'selected'; ?>>
                                            <?= $zone['eng_name']; ?> (<?= $zone['guj_name']; ?>)
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile111">Profile Photo<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="exampleInputFile11" <?php if (!isset($row_data)) {
                                    echo '';
                                } ?>>
                                <label class="custom-file-label" for="exampleInputFile11">Choose Photo</label>
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

    <!-- Table for displaying existing data -->
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title"><?= $page_title; ?></h3>
        </div>
        <div class="card-body p-3 table-responsive">
            <table class="table table-striped" id="datatable">
                <!-- Table content goes here -->
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('admin/New_philanthropist/fetch_data'); ?>",
                "type": "POST"
            },
            "columns": [
                { "title": "Id" },
                { "title": "Action", "orderable": false },
                { "title": "English Title" },
                { "title": "Gujarati Title" },
                { "title": "Company" },
                { "title": "City" },
                { "title": "Category" },
                { "title": "Zone" },
                { "title": "Photo" },
            ]
        });
    });
</script>