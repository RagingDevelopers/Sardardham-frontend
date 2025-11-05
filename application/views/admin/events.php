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
    <div class="col-md-12 pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Events</h3>
            </div>
            <form action="<?php if(isset($row_data)){ echo base_url().'admin/events/update/'.$row_data['id']; }else{ echo base_url().'admin/events/create'; } ?>" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="language">Language <span class="text-danger">*</span></label>
                                <select name="language" class="form-control" id="language" required>
                                    <option value="">Select Language</option>
                                    <?php 
                                        if (isset($languages) && !empty($languages)) {
                                            foreach($languages as $lang) { ?>
                                            <option value="<?= $lang['id'] ?>" <?= ((isset($row_data) && ($row_data['language_id'] == $lang['id'])) ? "selected" : "") ?>><?= $lang['name'] ?></option>
                                            <? }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" value="<?php if(isset($row_data)){ echo $row_data['title']; } ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile111">PDF<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="pdf" class="custom-file-input" id="exampleInputFile11" <?php if(!isset($row_data)){ echo 'required'; } ?>>
                                        <label class="custom-file-label" for="exampleInputFile11">Choose PDF</label>
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
                                <label for="redirect_url">Redirect URL</label>
                                <input type="text" name="redirect_url" value="<?php if(isset($row_data)){ echo $row_data['redirect_url']; } ?>" class="form-control" id="redirect_url" placeholder="Enter Url">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" class="form-control" id="type" required>
                                    <option value="">Select Type</option>
                                    <option value="news" <?= (isset($row_data) && $row_data['type'] == "news") ? "selected" : "" ?>>News</option>
                                    <option value="event" <?= (isset($row_data) && $row_data['type'] == "event") ? "selected" : "" ?>>Event</option>
                                </select>
                            </div>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="exampleInputFile">Photo<span class="text-danger">*</span>&nbsp;&nbsp;(406px X 500 px)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="exampleInputFile1" <?php if(!isset($row_data)){ echo 'required'; } ?>>
                                <label class="custom-file-label" for="exampleInputFile1">Choose Photo</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Event Date<span class="text-danger">*</span></label>
                        <input type="date" name="event_date" value="<?php if(isset($row_data)){ echo $row_data['event_date']; } ?>" class="form-control" id="exampleInputEmail2" placeholder="Enter event_date" required>
                    </div>
                    <!--<div class="form-group">-->
                    <!--    <label for="exampleInputEmail2">Description<span class="text-danger">*</span></label>-->
                    <!--    <input type="text" id="description" name="description" value="<?php if(isset($row_data)){ echo $row_data['description']; } ?>" class="form-control" id="exampleInputEmail2" placeholder="Enter description" >-->
                    <!--</div>-->
                    <div class="form-group">
                        <label for="exampleInputEmail2">Description<span class="text-danger">*</span></label>
                        <textarea name="description" id="description">
                            <?php if(isset($row_data)){ echo $row_data['description']; } ?>
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
            <h3 class="card-title">Events Table</h3>
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
            <table class="table table-striped table-responsive" id="datatable">
                
                
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
        "ajax": {
            "url": "<?php echo base_url('admin/Events/fetch_data'); ?>",
            "type": "POST",
            "data": function(d) {
                d.language = $('#languageFilter').val(); // Send the selected language filter
            }
        },
        "columns": [
            { "title": "Id" },
            { "title": "Action", "orderable": false  },
            { "title": "Status", "orderable": false },
            { "title": "Language"},
            { "title": "Title" },
            { "title": "Photo", "orderable": false },
            { "title": "PDF", "orderable": false },
            { "title": "Description", "orderable": false },
            { "title": "Event Date" },
            { "title": "Type" },
            { "title": "Redirect Url" }
        ]
    });

    // Filter by language when dropdown changes
    $('#languageFilter').change(function() {
        $('#datatable').DataTable().ajax.reload(); // Reload the data
    });
    
    $(document).on('change', '.changeStatus', function() {
        var isChecked = $(this).is(':checked');
        var id = $(this).data('id');
        var newStatus = isChecked ? 'ACTIVE' : 'IN-ACTIVE';

        $.ajax({
            url: '<?php echo base_url("admin/Events/change_status"); ?>',
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


<script>
$(document).ready(function() {
  $('#description').summernote({
    placeholder: 'Start typing here...',
    tabsize: 2,
    height: 120
  });
});
</script>