<?php require APPROOT.'/views/inc/header.php'?>
<div class="row">
    <div class="col-md-9 mx-auto">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php prettify($data['passive']); ?>
            <form action="">
            <?php foreach($data['progress'] as $wordAsk) :?>
            <div id="q<?=$wordAsk->id?>" class="accordion-item">
                <h3 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk->id?>" aria-expanded="false" aria-controls="flush-collapse<?=$wordAsk->id?>">
                    <div class="col-lg-5">
                        <?=$wordAsk->word?>
                    </div>
                    <div class="col-lg-6">
                        --------
                    </div>                
                </button>
                </h3>
                <div id="flush-collapse<?=$wordAsk->id?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$wordAsk->id?>" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form action="#">
                    <p>
                        <input type="radio" id="test1" name="radio-group">
                        <label for="test1" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk->id?>">gitmek</label>
                    </p>
                    <p>
                        <input type="radio" id="test2" name="radio-group">
                        <label for="test2" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk->id?>">yazmak</label>
                    </p>
                    <p>
                        <input type="radio" id="test3" name="radio-group">
                        <label for="test3" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk->id?>">görmek</label>
                    </p>
                    </form>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
            </form>
            
            <div id="q2" class="accordion-item">
                <h3 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <div class="col-lg-5">
                        schreiben
                    </div>
                    <div class="col-lg-6">
                        --------
                    </div>                
                </button>
                </h3>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form action="#">
                    <p>
                        <input type="radio" id="q2-1" name="radio-group">
                        <label for="q2-1" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo">anlamak</label>
                    </p>
                    <p>
                        <input type="radio" id="q2-2" name="radio-group">
                        <label for="q2-2" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo">yazmak</label>
                    </p>
                    <p>
                        <input type="radio" id="q2-3" name="radio-group">
                        <label for="q2-3" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo">gitmek</label>
                    </p>
                    </form>
                </div>
                </div>
            </div><!-- Accordion-->
        </div>
    </div>
</div><!--.row-->

<?php require APPROOT.'/views/inc/footer.php'?>