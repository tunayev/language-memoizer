<?php require APPROOT.'/views/inc/header.php'?>
<a href="<?=URLROOT?>/posts" class="btn btn-light"><i class="fas fa-chevron-left"></i> Go Back</a>
<div class="row my-3">
<h1><?= $data['post']->title ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by: <?=$data['user']->name?> on <?=$data['post']->created_at?>
</div>
<p><?=$data['post']->body?></p>
</div>
<?php if($data['post']->user_id === $_SESSION['user_id']) : ?>
<div class="ro">
    <a href="<?=URLROOT?>/posts/edit/<?=$data['post']->id?>" class="btn btn-dark float-start">Edit</a>
    <form action="<?=URLROOT?>/posts/delete/<?=$data['post']->id?>" method="POST" class="float-end">
    <input type="submit" value="Delete" class="btn btn-danger">
    </form>
</div>
<?php endif; ?>
<?php require APPROOT.'/views/inc/footer.php'?>
