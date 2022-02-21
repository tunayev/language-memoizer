<?php require APPROOT.'/views/inc/header.php'?>

<div class="row">
    <div class="col-md-9 mx-auto">
            <?php foreach($data['courses'] as $course):?>
                <div class="card mt-5">
                    <div class="card-header"><h2><?=$course->name?></h2></div>
                    <div class="card-body"> 
                    <table class="table table-hover">
                    <tr>
                        <th></th>
                        <th>Kelime</th>
                        <th>Gramer</th>
                    </tr>
                    <?php foreach($data['subjects'] as $subject):?>
                        <?php if($subject->courseName == $course->name):?>
                            <tr>
                                <td><?=$subject->name?></td>
                                <td><a href="<?=URLROOT.'/vocabs/test/'.$subject->subjectId?>" class="btn btn-primary">Test <i class="fas fa-chevron-right"></i></a> </td>
                                <td><a href="<?=URLROOT.'/grammar/test/'.$subject->subjectId?>" class="btn btn-primary">Test</a></td>
                            </tr>
                        <?php endif;?>
                    <?php endforeach;?>
                    </table>
                    </div>
                </div>
            <?php endforeach;?>
    </div>
</div>

<?php require APPROOT.'/views/inc/footer.php'?>
