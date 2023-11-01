<?php $this->view('includes/header', $data);?>

<div class="mx-auto col-md-4 bg-light shadow m-4 p-4 border">
	<h2><?=$title?></h2>

    <?php if ($mode == 'new' || (($mode == 'edit' || $mode == 'delete') && $row)): ?>

        <?php if ($mode == 'delete'): ?>
            <div class="alert alert-danger text-center">Are you sure you want to delete this image ?!</div>
        <?php endif?>
        <form method="post" enctype="multipart/form-data">

            <input class="my-3 form-control" value="<?=old_value('title', $row->title ?? '')?>" name="title" placeholder="Image title">
            <div><small class="text-danger"><?=$photo->getError('title')?></small></div>

            <label class="d-block">
            <?php if ($mode != 'delete'): ?>
                <div class="input-group mb-3">
                    <input onchange="display_image(this.files[0])" name="image" type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Select Image</label>
                </div>
                <div><small class="text-danger"><?=$photo->getError('image')?></small></div>
            <?php endif?>

                <div>
                    <img src="<?=get_image($row->image ?? '')?>" class="js-image-preview img-thumbnail mx-auto d-block" style="cursor: pointer;">
                </div>
            </label>
            <?php if ($mode == 'delete'): ?>
                <button class="btn btn-danger my-3">Delete</button>
            <?php else: ?>
                <button class="btn btn-primary my-3">Save</button>
            <?php endif?>
        </form>
    <?php else: ?>
        <div class="p-2 text-center">Image not found!</div>
    <?php endif?>
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

