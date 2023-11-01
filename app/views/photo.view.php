<?php $this->view('includes/header', $data);?>

<div class="p-4 text-center"><h3>Single Photo View</h3></div>
<div class="row p-4 justify-content-center">
    <?php if (!empty($row)): ?>
        <div class="col-sm-12 text-center bg-light">
            <div class="card-header"><h4><?=esc($row->title)?></h4></div>
            <div class="card-header"><a href="<?=ROOT?>/profile/<?=$row->user_id?>"><i>By: <?=esc($row->username)?></i></a></div>
            <img src="<?=get_image($row->image)?>" class="img-thumbnail">
            <br>
            <?php if ($ses->is_logged_in() && $ses->user('id') == $row->user_id): ?>
                <a href="<?=ROOT?>/upload/edit/<?=$row->id?>">
                    Edit Image
                </a>
                |
                <a href="<?=ROOT?>/upload/delete/<?=$row->id?>">
                    Delete Image
                </a>
            <?php endif?>
        </div>
    <?php else: ?>
        <div class="p-2 text-center">Image not found!</div>
    <?php endif?>
</div>
<?php $this->view('includes/footer', $data);?>

