<?php require APPROOT.'/views/inc/header.php'?>
<?php require APPROOT.'/views/inc/adminsidebar.php'?>
<div class="col-md-9">
<h1><?= $data['title'];?></h1>
<p><?= $data['description'];?></p>
    <form action="<?php echo URLROOT; ?>/cpadmin/bulkVocab" method="POST" name="upload_csv" enctype="multipart/form-data">
    <div class="row">
        <?=flash('bulk_success'); ?>
        <div class="form-group col-lg-4">
        <input class="form-control" name="file" type="file" id="formFile">
        </div>
        <div class="form-group col-lg-4">
            <select name="subjectId" id="" class="form-select">
                <?php foreach($data['subjects'] as $subject) : ?>
                <option value="<?=$subject->id?>"><?=$subject->courseName.' - '.$subject->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-lg-4 d-grid">
            <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
        </div>
    </div>
    </form>

</div>
<?= 'Version: '.APP_VERSION;?>
<?php require APPROOT.'/views/inc/footer.php'?>
