<?php require APPROOT.'/views/inc/header.php'?>
<div class="row">
    <div class="col-md-9 mx-auto">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php //prettify($data['passive']); ?>
            <form action="">
            <?php foreach($data['rquestions'] as $wordAsk) :?>
            <div id="q<?=$wordAsk['word_id']?>" class="accordion-item">
                <h3 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk['word_id']?>" aria-expanded="false" aria-controls="flush-collapse<?=$wordAsk['word_id']?>">
                    <div class="col-lg-5">
                        <?=$wordAsk['word']?>
                    </div>
                    <div class="col-lg-6">
                        --------
                    </div>                
                </button>
                </h3>
                <div id="flush-collapse<?=$wordAsk['word_id']?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$wordAsk['word_id']?>" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <?php 
                    $answers = $data['passive'];
                    shuffle($answers);
                    $answers = array_slice($answers, 0, 3);
                    $answers[3] = $wordAsk;
                    //prettify($answers);
                    
                    ?>
                    <form action="#">
                        <?php foreach($answers as $answer) : ?>
                    <p>
                        <input type="radio" id="test<?=$answer['word_id']?>" name="radio-group">
                        <label for="test<?=$answer['word_id']?>" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk['word_id']?>"><?=$answer['word_tr']?></label>
                    </p>
                        <?php endforeach; ?>
                    </form>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
            </form>
        </div><!-- Accordion-->
    </div>
</div><!--.row-->

<?php require APPROOT.'/views/inc/footer.php'?>