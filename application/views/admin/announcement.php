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
                <h3 class="card-title">Announcement</h3>
            </div>
            <form action="<?php if(isset($row_data)){ echo base_url().'admin/announcement/update/'.$row_data['id']; }else{ echo base_url().'admin/announcement/create'; } ?>" method="post" enctype="multipart/form-data">
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
                                <label for="">Type <span class="text-danger">*</span></label>
                                <select name="type" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="E-notice board" <?= (isset($row_data) && $row_data['type'] == "E-notice board") ? "selected" : "" ?>>E-notice Board</option>
                                    <option value="What's next" <?= (isset($row_data) && $row_data['type'] == "What's next") ? "selected" : "" ?>>What's next</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile111">Document<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="document" class="custom-file-input" id="exampleInputFile11">
                                        <label class="custom-file-label" for="exampleInputFile11">Choose Documents</label>
                                    </div>
                                </div>
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
            <h3 class="card-title">Announcement Table</h3>
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
            "url": "<?php echo base_url('admin/Announcement/fetch_data'); ?>",
            "type": "POST",
            "data": function(d) {
                d.language = $('#languageFilter').val(); // Send the selected language filter
            }
        },
        "columns": [
            { "title": "Id" },
            { "title": "Action", "orderable": false  },
            { "title": "Language"},
            { "title": "Title" },
            { "title": "Type", "orderable": false },
            { "title": "Document", "orderable": false },
        ]
    });

    // Filter by language when dropdown changes
    $('#languageFilter').change(function() {
        $('#datatable').DataTable().ajax.reload(); // Reload the data
    });
    
});
</script>
