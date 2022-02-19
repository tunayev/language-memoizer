<?php require APPROOT.'/views/inc/header.php'?>
<div class="row">
    <div class="col-md-9 mx-auto">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php //prettify($data['passive']); ?>
            <form action="<?=URLROOT?>/vocabs/test" method="POST">
            <?php foreach($data['rquestions'] as $wordAsk) :?>
            <div id="q<?=$wordAsk['word_id']?>" class="accordion-item">
                <h3 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk['word_id']?>" aria-expanded="false" aria-controls="flush-collapse<?=$wordAsk['word_id']?>">
                    <div class="col-lg-5">
                        <?=$wordAsk['word']?>
                    </div>
                    <div id="fill-<?=$wordAsk['word_id']?>" class="col-lg-6">
                        --------
                    </div>                
                </button>
                </h3>
                <div id="flush-collapse<?=$wordAsk['word_id']?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$wordAsk['word_id']?>" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <fieldset id="<?=$wordAsk['word_id']?>">
                        <?php 
                        $answers = $data['passive'];
                        $pos = array_search($wordAsk,$answers);
                        unset($answers[$pos]);
                        shuffle($answers);
                        $answers = array_slice($answers, 0, 3);
                        $answers[3] = $wordAsk;
                        //$answers = make_unique($answers, 'word_id');
                        //array_unique($answers);
                        shuffle($answers);
                        //prettify($answers);
                        ?>
                        
                        <?php foreach($answers as $answer) : ?>
                        <p>
                            <input type="radio" name="<?=$wordAsk['word_id']?>" data-value="<?=$wordAsk['word_tr']?>" value="<?=$answer['word_id']?>" id="test<?=$answer['word_id']?>" name="radio-group">
                            <label for="test<?=$answer['word_id']?>" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk['word_id']?>" onclick="fill(this, <?=$wordAsk['word_id']?>)"><?=$answer['word_tr']?></label>
                        </p>
                        <?php endforeach; ?>
                        </fieldset>  
                    </div>
                </div>
            </div><!-- .accordion-item -->
            <?php endforeach; ?>
            <div class="row my-2">
                <div class="col d-grid">
                <input style="padding: 0.8rem" type="submit" value="DEVAM ET" class="btn btn-success btn-block">
                </div>
            </div>
            </form>
        </div><!-- Accordion-->
    </div>
</div><!--.row-->

<?php require APPROOT.'/views/inc/footer.php'?>