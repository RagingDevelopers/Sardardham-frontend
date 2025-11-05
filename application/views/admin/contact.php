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
    <div class="card mt-3">
        <div class="card-header bg-primary">
            <h3 class="card-title">Contact Table</h3>
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
            "url": "<?php echo base_url('admin/contact/fetch_data'); ?>",
            "type": "POST",
            "data": function(d) {
                // d.document_category = $('#categoryFilter').val(); // Send the selected language filter
            }
        },
        "columns": [
            { "title": "Id" },
            { "title": "Name" },
            { "title": "Email" },
            { "title": "Mobile" },
            { "title": "Subject" },
            { "title": "Message" },
            { "title": "Department" },
        ]
    });

    // Filter by language when dropdown changes
    // $('#categoryFilter').change(function() {
    //     $('#datatable').DataTable().ajax.reload(); // Reload the data
    // });
});
</script>