<?php $this->view('includes/header', $data);?>

<div class="mx-auto col-md-4 bg-light shadow m-4 p-4 border">
	<h1>Upload Image</h1>
	<form method="post">

		<input class="my-3 form-control" value="<?=old_value('title')?>" name="title" placeHolder="Image title">
		<div><small class="text-danger"><?=$photo->getError('title')?></small></div>

        <label class="d-block">
            <div class="input-group mb-3">
                <input onchange="display_image(this.files[0])" name="image" type="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Select Image</label>
            </div>

            <div><small class="text-danger"><?=$photo->getError('image')?></small></div>

            <div>
                <img src="<?=get_image()?>" class="js-image-preview img-thumbnail mx-auto d-block" style="cursor: pointer;">
            </div>
        </label>
		<button class="my-3 btn btn-primary">Upload</button>
	</form>
</div>

<script type="text/javascript">
    function display_image(file)
    {
        let allowed = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];
        if (!allowed.includes(file.type))
        {
            alert("The only files supported are: " + allowed.toString().replaceAll("image/", " "));
            return;
        }
        document.querySelector(".js-image-preview").src = URL.createObjectURL(file);
    }
</script>
<?php $this->view('includes/footer', $data);?>

