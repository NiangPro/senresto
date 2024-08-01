<?php 


function setToastr($message, $type = "success"){
    $_SESSION["toastr"] = [
        "type" => $type,
        "message" => $message
    ];
}