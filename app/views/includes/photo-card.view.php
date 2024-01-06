<style>
    .heart:hover {
        transform: scale(1.2);
    }
</style>

<div style="position: relative" class="col-sm-4 col-md-3 m-2 col-lg-2 text-center bg-light">

<?php
$heart_color = $like->userLiked(user('id'), $row->id) ? "#fd0dd8" : "#0d6efd";
$likes = $like->getLikes($row->id);
if ($likes == 0) {
    $likes = "";
}
?>

<div onclick="post.like('<?=$row->id?>', this)" class="heart p-2 bg-white border" style="transition: all 0.3s cubic-bezier(.68, -0.55, .27, 1.55); position: absolute; right: 10px; cursor: pointer;" >
    <svg fill="<?=$heart_color?>" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.435c-1.989-5.399-12-4.597-12 3.568 0 4.068 3.06 9.481 12 14.997 8.94-5.516 12-10.929 12-14.997 0-8.118-10-8.999-12-3.568z"/></svg>
    <span class="js-likes-count"><?=$likes?></span>
</div>
    <a href="<?=ROOT?>/photo/<?=$row->id?>">
        <img src="<?=get_image($image->getThumbnail($row->image, 250, 251))?>" class="img-thumbnail">
        <div class="card-header"><?=esc($row->title)?></div>
    </a>
</div>