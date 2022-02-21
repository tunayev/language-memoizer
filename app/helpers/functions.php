<?php
function prettify($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function inAdmin(){
    if (strpos(strtolower($_SERVER['REQUEST_URI']), 'cpadmin') !== false) {
        return true;
    }
}

function evaluate($questions){
    //$user = ORM::for_table('progress')->where('user_id', $_SESSION['user_id'])->find_one();
    //print_r($user);
    foreach ($questions as $key => $value) {
        if($key == $value) {
            $vocabulary = ORM::for_table('progress')->where('user_id', $_SESSION['user_id'])->where('word_id', $key)->find_one();
            if($vocabulary->status == "passive") {
            $vocabulary->status = "known";
            $vocabulary->level = 4;
            $vocabulary->save();                
            } else {
            $vocabulary->status = "active";
            $vocabulary->level++;
            $vocabulary->save();
            }

        } else {
            $vocabulary = ORM::for_table('progress')->where('user_id', $_SESSION['user_id'])->where('word_id', $key)->find_one();
            //$vocabulary = $user->where('word_id', $key)->find_one();
            $vocabulary->status = "active";
            $vocabulary->level--;
            $vocabulary->save();
        }
    }
}

function findQuestions($questions) {
    $vocabulary = [];
    foreach ($questions as $key => $value) {
    $newVocabulary = ORM::for_table('progress')->where('user_id', $_SESSION['user_id'])->where('word_id', $key)->find_one();
    $userAnswer = ORM::for_table('vocabulary')->find_one($value);
    $userAnswer ? $newVocabulary->userAnswer = $userAnswer->wordtr : $newVocabulary->userAnswer = '-----' ;
    array_push($vocabulary, $newVocabulary);
    }  
    return $vocabulary;
}