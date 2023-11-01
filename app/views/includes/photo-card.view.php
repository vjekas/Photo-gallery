<div class="col-sm-4 col-md-3 m-2 col-lg-2 text-center bg-light">
    <a href="<?=ROOT?>/photo/<?=$row->id?>">
        <img src="<?=get_image($image->getThumbnail($row->image, 250, 251))?>" class="img-thumbnail">
        <div class="card-header"><?=esc($row->title)?></div>
    </a>
</div>