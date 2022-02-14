<?php require APPROOT.'/views/inc/header.php'?>
<?=flash('post_message')?>
<div class="row my-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?= URLROOT ?>/posts/add" class="btn btn-primary float-end">
            <i class="fa fa-pencil"></i> Add Posts
        </a>
        </div>
</div>
<?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
        <h4 class="title">
            <?=$post->title?>
        </h4>
        <div class="bg-light p-2 mb-3">
            Written by: <?=$post->name;?> at: <?= $post->postCreated?>
        </div>
        <p class="card-text">
            <?=$post->body?>
        </p>
        <a href="<?=URLROOT?>/posts/show/<?=$post->postId?>" class="btn btn-dark">More...</a>
    </div>

<?php endforeach; ?>
    
<?php require APPROOT.'/views/inc/footer.php'?>
