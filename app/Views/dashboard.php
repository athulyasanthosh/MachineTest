<?php $this->extend('header'); ?>
<?php $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Files Listing</h2>
			<hr>
		</div>
		<div class="row">
			<div class="col-md-6">
				<form method="POST" action="<?php echo base_url("home/documentUpload"); ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-md-4">
							<input type="file" name="file_name">
							<?php if(!empty($validation)) : ?>
									<span class="text-danger"><?php echo $validation->getError('file_name'); ?></span>
							<?php endif; ?>							
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success mr-2">Upload</button>
						</div>
					</div>					
				</form>				
			</div>
			<div class="col-md-6">
				<input id="search-file" type="text" placeholder="Search..">
			</div>			
		</div>
		<?php 
		/*$name = $session->get('success');
		echo $name;*/
		//echo "<pre>";print_r($_SESSION['success']);exit; ?>
		<div class="row">
			<?php if (session()->has('success')) : ?>
			    <div class="alert alert-success">
			        <?= session('success') ?>
			    </div>
			<?php endif ?>

			<?php if (session()->has('error')) : ?>
			    <div class="alert alert-danger">
			        <?= session('error') ?>
			    </div>
			<?php endif ?>
		</div>
		
		<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>No</th>
		        <th>Document Name</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="file-Listing">
		    	<?php $count = 1; ?>
		    	<?php if(!empty($fileDatas)): ?>
		    		<?php foreach($fileDatas as $fileData): ?>
		    			<tr>
					        <td><?php echo $count++; ?></td>
					        <td><?php echo $fileData['file_name']; ?></td>
					        <td><a href="" class="btn btn-danger delete-file" id="<?php echo $fileData['id'];?>">Delete</a></td>
					      </tr>	
		    		<?php endforeach;?>
		    	<?php endif; ?>		      	      
		    </tbody>
		</table>
		<div class="d-flex justify-content-end">
		<?php if($pager): ?>
        <?= $pager->links(); ?>
    <?php endif; ?>
      </div>	
	</div>
	
</div>

  <script type="text/javascript">

  	$(document).ready(function(){
	  $("#search-file").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#file-Listing tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});

    $(".delete-file").click(function(){
        var id = $(this).attr("id");
        var BASE_URL = "<?php echo base_url(); ?>";

        if(confirm('Are you sure to remove this record ?'))

        {

            $.ajax({

            	url: BASE_URL+'/home/deleteFile',

               type: 'POST',

               data: {id: id},

               error: function() {

                  alert('Something is wrong');

               },

               success: function(data) {
               	console(data);
                    $("#"+id).remove();

                    alert("Record removed successfully");  

               }

            });

        }

    });


</script>
</html>
<?php $this->endSection(); ?>