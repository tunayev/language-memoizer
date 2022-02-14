<?php require APPROOT.'/views/inc/header.php'?>
        <a href="<?=URLROOT?>/posts" class="btn btn-light"><i class="fas fa-chevron-left"></i> Go Back</a>
        <div class="card card-body bg-light mt-5">
            <h2>Edit Post</h2>
            <p>Edit your thoughts</p>
            <form action="<?php echo URLROOT; ?>/posts/edit/<?=$data['id']?>" method="post">

            <div class="form-group">
                <label for="email">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="body">Your post: <sup>*</sup></label>
                <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
            </form>            
        </div>

<?php require APPROOT.'/views/inc/footer.php'?>
