<?php

function display_validation_error($validation, $feild){
    if(isset($validation)){
        if($validation->hasError($feild))
            return $validation->getError($feild);
        else 
            return "";
    }
    else
        return "";
}

function show_errors($validation, $feild){
    if(isset($validation)){
        if ($validation->hasError($feild)) {
            return $validation->getError($feild);
        }
    }
    else return "";
    return $feild;
}