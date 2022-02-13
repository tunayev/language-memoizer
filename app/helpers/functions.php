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