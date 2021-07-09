<style type="text/css">
	.gallery-img{
		padding: 10px;
	}
	.img-box{
		display: inline;
		padding-top: 10px;
	}

	img{
		padding-top: 10px;
	}


	.badge{
		background-color: red;
	}



</style>

<div class="container">
	<h1><?php echo $title; ?></h1>
	<hr>

	<!-- Display status message -->
	<?php if (!empty($error_msg)) {?>
	<div class="col-xs-12">
		<div class="alert alert-danger"><?php echo $error_msg; ?></div>
	</div>
	<?php }?>

	<div class="row">
		<div class="col-md-12">
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label>Title:</label>
					<input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo !empty($gallery['title']) ? $gallery['title'] : ''; ?>" >
					<?php echo form_error('title', '<p class="help-block text-danger">', '</p>'); ?>
				</div>
				<div class="form-group">
					<label>Images:</label>
					<input type="file" name="images[]" class="form-control" multiple>
					<?php if (!empty($gallery['images'])) {?>
						<div class="gallery-img">
						<?php foreach ($gallery['images'] as $imgRow) {?>
							<div class="img-box" id="imgb_<?php echo $imgRow['id']; ?>">
								<img src="<?php echo base_url('uploads/images/' . $imgRow['file_name']); ?>">
								<a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>
							</div>
						<?php }?>
						</div>
					<?php }?>
				</div>

				<a href="<?php echo base_url('index.php/manage_gallery'); ?>" class="btn btn-secondary">Back</a>
				<input type="hidden" name="id" value="<?php echo !empty($gallery['id']) ? $gallery['id'] : ''; ?>">
				<input type="submit" name="imgSubmit" class="btn btn-success" value="SUBMIT">
			</form>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
function deleteImage(id){
    var result = confirm("Are you sure to delete?");
    if(result){
        $.post( "<?php echo base_url('index.php/manage_gallery/deleteImage'); ?>", {id:id}, function(resp) {
            if(resp == 'ok'){
                $('#imgb_'+id).remove();
                alert('The image has been removed from the gallery');
            }else{
                alert('Some problem occurred, please try again.');
            }
        });
    }
}
</script>
