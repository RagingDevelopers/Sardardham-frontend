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
            <form action="<?php if(isset($row_data)){ echo base_url().'admin/team/update/'.$row_data['id']; }else{ echo base_url().'admin/team/create'; } ?>" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">English Name <span class="text-danger">*</span></label>
                                <input type="text" name="eng_name" value="<?php if(isset($row_data)){ echo $row_data['eng_name']; } ?>" class="form-control" id="" placeholder="Enter name in English" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gujarati Name <span class="text-danger">*</span></label>
                                <input type="text" name="guj_name" value="<?php if(isset($row_data)){ echo $row_data['guj_name']; } ?>" class="form-control" id="" placeholder="Enter name in Gujarati" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Designation in English <span class="text-danger">*</span></label>
                                <input type="text" name="eng_designation" value="<?php if(isset($row_data)){ echo $row_data['eng_designation']; } ?>" class="form-control" id="" placeholder="Enter designation in English" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Designation in Gujarati <span class="text-danger">*</span></label>
                                <input type="text" name="guj_designation" value="<?php if(isset($row_data)){ echo $row_data['guj_designation']; } ?>" class="form-control" id="" placeholder="Enter designation in Gujarati" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sub designation in English <span class="text-danger">*</span></label>
                                <input type="text" name="eng_sub_designation" value="<?php if(isset($row_data)){ echo $row_data['eng_sub_designation']; } ?>" class="form-control"  placeholder="Enter sub designation in English" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sub designation in Gujarati <span class="text-danger">*</span></label>
                                <input type="text" name="guj_sub_designation" value="<?php if(isset($row_data)){ echo $row_data['guj_sub_designation']; } ?>" class="form-control"  placeholder="Enter sub designation in Gujarati" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sequence <span class="text-danger">*</span></label>
                                <input type="number" name="sequence" value="<?php if(isset($row_data)){ echo $row_data['sequence']; } ?>" class="form-control" id="" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile111">Images<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile1" <?php if(!isset($row_data)){ echo 'required'; } ?>>
                                        <label class="custom-file-label" for="exampleInputFile1">Choose img</label>
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
            "url": "<?php echo base_url('admin/Team/fetch_data'); ?>",
            "type": "POST",
            "data": function(d) {
                // d.document_category = $('#categoryFilter').val(); // Send the selected language filter
            }
        },
        "columns": [
            { "title": "Id" },
            { "title": "Action", "orderable": false },
            { "title": "English Name" },
            { "title": "Gujarati Name" },
            { "title": "English Designation" },
            { "title": "Gujarati Designation" },
            { "title": "English Sub Designation" },
            { "title": "Gujarati Sub Designation" },
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