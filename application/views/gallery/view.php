<style type="text/css">
	.gallery-img{
		padding: 10px;
	}
	.img-box{
		display: inline;
	}
	img{
		padding-top: 10px;
	}
	.badge{
		background-color: red;
	}

	.badge-success{
		background-color: green;
		position: relative;

	}



</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><?php echo !empty($gallery['title']) ? $gallery['title'] : ''; ?></h3>
			<?php
$dir_thumbs = './uploads/images/';
$dir_images = 'uploads/images/';

?>
			<?php if (!empty($gallery['images'])) {?>
				<div class="gallery-img">
				<?php foreach ($gallery['images'] as $imgRow) {?>
					<div class="img-box" id="imgb_<?php echo $imgRow['id']; ?>">
						<a id="aa" href="<?php echo base_url($dir_images) . $imgRow['file_name']; ?>">
						<img src="<?php echo base_url('uploads/images/' . $imgRow['file_name']); ?>">
						</a>
						<a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>

					</div>
				<?php }?>
				</div>
			<?php }?>
		</div>
		<a href="<?php echo base_url('index.php/manage_gallery'); ?>" class="btn btn-primary">Back to List</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.7.0/simple-lightbox.min.js" integrity="sha512-ZajFBgnksNp8Rj+AbmYe8ueOu45HiSjtf3QpqnRbHlq719m6VK0FkbYIqQ8wEnlVuJ1i9pC+z6Z9ewmDnUTMCg==" crossorigin="anonymous"></script>

<script type='text/javascript'>
		$(document).ready(function() {
			$('.img-box #aa').simpleLightbox();
		});
	</script>




