<?php require APPROOT.'/views/inc/header.php'?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
    <div class="col-md-9 mx-auto">
        <?php //prettify($data['answers']); ?>
        <table class="table">
            <thead>
                <tr><th>Kelime</th><th>Cevabınız</th><th>Doğru Cevap</th></tr>
            </thead>
            <tbody>
                <?php foreach($data['answers'] as $answer) : ?>
                <tr class="<?=$answer['word_tr'] == $answer['userAnswer'] ? "success" : "danger" ?>"><td><?=$answer['word']?></td><td><?=$answer['userAnswer']?></td><td><?=$answer['word_tr']?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row my-2">
            <div class="col d-grid">
            <a class="btn btn-success btn-block" href="<?=URLROOT?>/vocabs/test/<?=$data['id'].'?p='.$data['p']+1?>">DEVAM ET</a>
            </div>
        </div>        
    </div>
<?php else : ?>
<div class="row">
    <div class="col-md-9 mx-auto">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php //prettify($data['progress']); ?>
            <form action="<?=URLROOT?>/vocabs/test/0" method="POST">
            <?php foreach($data['rquestions'] as $wordAsk) :?>
            <div id="q<?=$wordAsk['word_id']?>" class="accordion-item">
                <h3 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk['word_id']?>" aria-expanded="false" aria-controls="flush-collapse<?=$wordAsk['word_id']?>">
                    <div class="col-5">
                        <?=$wordAsk['word']?>
                    </div>
                    <div id="fill-<?=$wordAsk['word_id']?>" class="col-6">
                        --------
                    </div>                
                </button>
                </h3>
                <div id="flush-collapse<?=$wordAsk['word_id']?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$wordAsk['word_id']?>" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <fieldset id="<?=$wordAsk['word_id']?>">
                        <?php 
                        $answers = $data['progress'];
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
                        <p>
                            <input type="radio" name="<?=$wordAsk['word_id']?>" data-value="<?=$wordAsk['word_tr']?>" value="blank-<?=$wordAsk['word_id']?>" id="blank-<?=$wordAsk['word_id']?>" name="radio-group" checked>
                            <label for="blank-<?=$wordAsk['word_id']?>" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk['word_id']?>" onclick="fill(this, <?=$wordAsk['word_id']?>)">--------</label>
                        </p>                        
                        <?php foreach($answers as $answer) : ?>
                        <p>
                            <input type="radio" name="<?=$wordAsk['word_id']?>" data-value="<?=$wordAsk['word_tr']?>" value="<?=$answer['word_id']?>" id="word-<?=$answer['word_id'].'-'.$wordAsk['word_id']?>" name="radio-group">
                            <label for="word-<?=$answer['word_id'].'-'.$wordAsk['word_id']?>" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$wordAsk['word_id']?>" onclick="fill(this, <?=$wordAsk['word_id']?>)"><?=$answer['word_tr']?></label>
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
<?php endif; ?>

<?php require APPROOT.'/views/inc/footer.php'?>