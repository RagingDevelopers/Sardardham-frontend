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
                <h3 class="card-title"><?=$page_title;?></h3>
            </div>
            <form action="<?php if(isset($row_data)){ echo base_url().'admin/philanthropist/data_update/'.$row_data['id']; }else{ echo base_url().'admin/philanthropist/insert'; } ?>" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                <div class="form-group">
                      <label for="exampleInputEmail12">English Title<span class="text-danger">*</span></label>
                    <select id="member_id" class="form-control" name="slider_id" required>
                        <option value=''>--Select Slider--</option>
                    <?php 
                    foreach($pdf as $pdf){?>
                        <option value="<?=$pdf['id']; ?>" <?php if(isset($row_data)&& $pdf['id'] == $row_data['title_id']){ echo 'selected'; } ?>><?=$pdf['eng_title'];?></option>
                    <?php } ?>
                    </select>
                </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sequence <span class="text-danger">*</span></label>
                        <input type="number" name="sequence" value="<?php if(isset($row_data)){ echo $row_data['sequence']; } ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile111">Images<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="exampleInputFile1" <?php if(!isset($row_data)){ echo 'required'; } ?>>
                                <label class="custom-file-label" for="exampleInputFile11">Choose img</label>
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
            <h3 class="card-title"><?=$page_title;?></h3>
        </div>
        <div class="card-body p-3">
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
            "url": "<?php echo base_url('admin/Philanthropist/get_data'); ?>",
            "type": "POST",
            "data": function(d) {
                // d.document_category = $('#categoryFilter').val(); // Send the selected language filter
            }
        },
        "columns": [
            { "title": "Id" },
            { "title": "Action", "orderable": false },
            { "title": "English Title" },
            { "title": "Sequence" },
            { "title": "Photo", "orderable": false },
        ]
    });

    // Filter by language when dropdown changes
    // $('#categoryFilter').change(function() {
    //     $('#datatable').DataTable().ajax.reload(); // Reload the data
    // });
});
</script>