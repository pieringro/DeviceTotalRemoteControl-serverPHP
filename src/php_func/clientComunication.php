<?php

function error($msg) {
    echo
    "{
        \"error\" : true,
        \"message\" : \"$msg\"
    }";
    die();
}

function ok() {
    echo
    "{
        \"error\" : false
    }";
}




?>