<style>
    table .form-check.form-switch {
        padding-left: 2.5em;
    }
</style>

<div class="container">
 <?php if ($this->session->flashdata('flash_message') != "") {
	$message = $this->session->flashdata('flash_message');  ?>
	<div class="alert alert-<?= $message['class']; ?> alert-dismissible" role="alert">
		<div>
			<h5 class="alert-title"><?= $message['message']; ?></h5>
		</div>
		<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
	</div>
<?php $this->session->set_flashdata('flash_message', "");
}  ?>
    <div class="col-md-12 pt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Documentary</h3>
            </div>
            <form action="<?php if(isset($row_data)){ echo base_url().'admin/documentary/update/'.$row_data['id']; }else{ echo base_url().'admin/documentary/create'; } ?>" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <!-- <div class="form-group">
                        <label for="">Documentary Category <span class="text-danger">*</span></label>
                        <select name="documentary_category_id" class="form-control" id="" required>
                            <option value="">Select Documentary Category</option>
                            < 
                                if (isset($documentary_category) && !empty($documentary_category)) {
                                    foreach($documentary_category as $dc) { ?>
                                    <option value="< $dc['id'] ?>" < ((isset($row_data) && ($row_data['documentary_category_id'] == $dc['id'])) ? "selected" : "") ?>>< $dc['eng_name'] ?></option>
                                    < }
                                }
                            ?>
                        </select>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">English Title<span class="text-danger">*</span></label>
                                <input type="text" name="eng_title" value="<?php if(isset($row_data)){ echo $row_data['eng_title']; } ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter title in English" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gujarati Title<span class="text-danger">*</span></label>
                                <input type="text" name="guj_title" value="<?php if(isset($row_data)){ echo $row_data['guj_title']; } ?>" class="form-control" id="" placeholder="Enter title in Gujarati" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Photo<span class="text-danger">*</span>&nbsp;&nbsp;(453px X 340px)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile1" <?php if(!isset($row_data)){ echo 'required'; } ?>>
                                        <label class="custom-file-label" for="exampleInputFile1">Choose Photo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                        <?php foreach(["ACTIVE","IN-ACTIVE"] as $s) { ?>
                                                <option value="<?=$s ?>"  <?= ($row_data['status'] ?? "ACTIVE") === $s ? "selected" : "" ?> >
                                                <?=$s?>
                                            </option>
                                        <?php  }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Youtube Link<span class="text-danger">*</span></label>
                                <input type="text" name="youtube_link" value="<?php if(isset($row_data)){ echo $row_data['youtube_link']; } ?>" class="form-control" id="exampleInputEmail2" placeholder="https:// Enter youtube_link" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sequence">Sequence <span class="text-danger">*</span></label>
                                <input type="number" name="sequence" id="sequence" min="0"
                                       value="<?php if(isset($row_data)){ echo (int)$row_data['sequence']; } else { echo ""; } ?>"
                                       class="form-control" placeholder="Enter sequence number" required>
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
            <h3 class="card-title">Documentary Table</h3>
        </div>
        <div class="card-body p-3">
            <!-- <div class="row">
                <div class="col-md-4 form-group">
                    <label for="categoryFilter">Filter by Documentary Category:</label>
                    <select id="categoryFilter" class="form-control">
                        <option value="">All Documentary Category</option>
                        <!-- Populate dropdown options dynamically from $languages
                        < foreach ($documentary_category as $dc): ?>
                            <option value="< $dc['id']; ?>">< $dc['eng_name']; ?></option>
                        < endforeach; ?>
                    </select>
                </div>
            </div> -->
            <table class="table table-striped" id="datatable">
                
                
            </table>
        </div>
    </div>
</div>
<script>
      $('#exampleInputFile1').bind('change', function() {
        var size = this.files[0].size;
       if(size <= 314627){
       }else{
           alert("Maximum Size Is 307 KB");
              this.value = null;
       }
    });
</script>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[3, "asc"]],
        "ajax": {
            "url": "<?php echo base_url('admin/Documentary/fetch_data'); ?>",
            "type": "POST",
            "data": function(d) {
                // d.document_category = $('#categoryFilter').val(); // Send the selected language filter
            }
        },
        "columns": [
            { "title": "Sr. No." },
            { "title": "Action", "orderable": false },
            { "title": "Status", "orderable": false },
            // { "title": "Documentary Category" },
            { "title": "Sequence" },
            { "title": "English Title" },
            { "title": "Gujarati Title" },
            { "title": "Photo", "orderable": false },
            { "title": "YouTube Link", "orderable": false },
        ]
    });

    // Filter by language when dropdown changes
    // $('#categoryFilter').change(function() {
    //     $('#datatable').DataTable().ajax.reload(); // Reload the data
    // });
    
    $(document).on('change', '.changeStatus', function() {
        var isChecked = $(this).is(':checked');
        var id = $(this).data('id');
        var newStatus = isChecked ? 'ACTIVE' : 'IN-ACTIVE';

        $.ajax({
            url: '<?php echo base_url("admin/Documentary/change_status"); ?>',
            type: 'POST',
            data: {
                id: id,
                status: newStatus
            },
            success: function(response) {
                // Handle success response
                alert('Status Updated Successfully');
            },
            error: function(xhr, status, error) {
                // Handle error response
                alert('Error changing status: ' + error);
            }
        });
    });
    
    
});
</script>




