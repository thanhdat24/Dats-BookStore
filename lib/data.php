<?php
function show_array($arr){
    if(is_array($arr)){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    return false;
}